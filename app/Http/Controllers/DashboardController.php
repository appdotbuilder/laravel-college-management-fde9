<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fund;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        
        // Get dashboard statistics based on user role
        $stats = $this->getDashboardStats($user);
        
        // Get recent activities based on user role
        $recentActivities = $this->getRecentActivities($user);
        
        return Inertia::render('dashboard', [
            'stats' => $stats,
            'recentActivities' => $recentActivities,
            'userRole' => $user->role
        ]);
    }

    /**
     * Get dashboard statistics based on user role.
     */
    protected function getDashboardStats($user)
    {
        if ($user->role === 'student') {
            // Student-specific stats
            $student = $user->student;
            if (!$student) {
                return [];
            }
            
            return [
                'totalInvoices' => $student->invoices()->count(),
                'unpaidInvoices' => $student->invoices()->unpaid()->count(),
                'totalPayments' => $student->payments()->count(),
                'totalFunds' => $student->funds()->received()->sum('amount'),
                'outstandingBalance' => $student->invoices()->unpaid()->sum('amount'),
            ];
        }
        
        // Admin/Staff stats
        return [
            'totalStudents' => Student::count(),
            'totalUsers' => User::count(),
            'totalInvoices' => Invoice::count(),
            'unpaidInvoices' => Invoice::unpaid()->count(),
            'totalPayments' => Payment::count(),
            'totalRevenue' => Payment::where('status', 'paid')->sum('amount'),
            'totalFunds' => Fund::received()->sum('amount'),
            'pendingPayments' => Payment::where('status', 'pending')->count(),
        ];
    }

    /**
     * Get recent activities based on user role.
     */
    protected function getRecentActivities($user)
    {
        if ($user->role === 'student') {
            $student = $user->student;
            if (!$student) {
                return [];
            }
            
            return [
                'recentInvoices' => $student->invoices()
                    ->with(['feeType', 'generatedBy'])
                    ->latest()
                    ->take(5)
                    ->get(),
                'recentPayments' => $student->payments()
                    ->with('receivedBy')
                    ->latest()
                    ->take(5)
                    ->get(),
                'recentFunds' => $student->funds()
                    ->latest()
                    ->take(5)
                    ->get(),
            ];
        }
        
        // Admin/Staff activities
        return [
            'recentStudents' => Student::with('user')
                ->latest()
                ->take(5)
                ->get(),
            'recentInvoices' => Invoice::with(['student.user', 'feeType'])
                ->latest()
                ->take(5)
                ->get(),
            'recentPayments' => Payment::with(['student.user', 'receivedBy'])
                ->latest()
                ->take(5)
                ->get(),
        ];
    }
}