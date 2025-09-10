import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/react';

interface DashboardStats {
    totalStudents?: number;
    totalUsers?: number;
    totalInvoices?: number;
    unpaidInvoices?: number;
    totalPayments?: number;
    totalRevenue?: number;
    totalFunds?: number;
    pendingPayments?: number;
    outstandingBalance?: number;
}

interface RecentStudent {
    id: number;
    user: { name: string };
}

interface RecentInvoice {
    id: number;
    invoice_number: string;
    amount: number;
    status: string;
    fee_type?: { name: string };
    student?: { user?: { name: string } };
}

interface RecentPayment {
    id: number;
    receipt_number: string;
    amount: number;
    status: string;
    method: string;
    student?: { user?: { name: string } };
}

interface RecentFund {
    id: number;
}

interface RecentActivity {
    recentStudents?: RecentStudent[];
    recentInvoices?: RecentInvoice[];
    recentPayments?: RecentPayment[];
    recentFunds?: RecentFund[];
}

interface Props {
    stats: DashboardStats;
    recentActivities: RecentActivity;
    userRole: 'admin' | 'student' | 'staff';
    [key: string]: unknown;
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

export default function Dashboard({ stats, recentActivities, userRole }: Props) {
    const isAdmin = userRole === 'admin';
    const isStudent = userRole === 'student';

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <div className="flex h-full flex-1 flex-col gap-6 rounded-xl p-6">
                {/* Welcome Section */}
                <div className="rounded-lg bg-gradient-to-r from-blue-500 to-purple-600 p-6 text-white">
                    <h1 className="text-2xl font-bold mb-2">
                        🎓 Welcome to College Management System
                    </h1>
                    <p className="opacity-90">
                        {isStudent && "View your invoices, payments, and account status"}
                        {isAdmin && "Manage students, track payments, and oversee college operations"}
                        {userRole === 'staff' && "Access student records and process payments"}
                    </p>
                </div>

                {/* Statistics Cards */}
                <div className="grid auto-rows-min gap-4 md:grid-cols-2 lg:grid-cols-4">
                    {isStudent ? (
                        // Student Stats
                        <>
                            <div className="rounded-lg border bg-white p-6 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <div className="flex items-center justify-between">
                                    <div>
                                        <p className="text-sm font-medium text-gray-500 dark:text-gray-400">Total Invoices</p>
                                        <p className="text-2xl font-bold text-gray-900 dark:text-white">{stats.totalInvoices || 0}</p>
                                    </div>
                                    <div className="rounded-full bg-blue-100 p-3 dark:bg-blue-900">
                                        <span className="text-xl">📄</span>
                                    </div>
                                </div>
                            </div>

                            <div className="rounded-lg border bg-white p-6 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <div className="flex items-center justify-between">
                                    <div>
                                        <p className="text-sm font-medium text-gray-500 dark:text-gray-400">Unpaid Invoices</p>
                                        <p className="text-2xl font-bold text-red-600">{stats.unpaidInvoices || 0}</p>
                                    </div>
                                    <div className="rounded-full bg-red-100 p-3 dark:bg-red-900">
                                        <span className="text-xl">⚠️</span>
                                    </div>
                                </div>
                            </div>

                            <div className="rounded-lg border bg-white p-6 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <div className="flex items-center justify-between">
                                    <div>
                                        <p className="text-sm font-medium text-gray-500 dark:text-gray-400">Total Payments</p>
                                        <p className="text-2xl font-bold text-gray-900 dark:text-white">{stats.totalPayments || 0}</p>
                                    </div>
                                    <div className="rounded-full bg-green-100 p-3 dark:bg-green-900">
                                        <span className="text-xl">💳</span>
                                    </div>
                                </div>
                            </div>

                            <div className="rounded-lg border bg-white p-6 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <div className="flex items-center justify-between">
                                    <div>
                                        <p className="text-sm font-medium text-gray-500 dark:text-gray-400">Outstanding Balance</p>
                                        <p className="text-2xl font-bold text-orange-600">RM {stats.outstandingBalance || 0}</p>
                                    </div>
                                    <div className="rounded-full bg-orange-100 p-3 dark:bg-orange-900">
                                        <span className="text-xl">💰</span>
                                    </div>
                                </div>
                            </div>
                        </>
                    ) : (
                        // Admin/Staff Stats
                        <>
                            <div className="rounded-lg border bg-white p-6 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <div className="flex items-center justify-between">
                                    <div>
                                        <p className="text-sm font-medium text-gray-500 dark:text-gray-400">Total Students</p>
                                        <p className="text-2xl font-bold text-gray-900 dark:text-white">{stats.totalStudents || 0}</p>
                                    </div>
                                    <div className="rounded-full bg-blue-100 p-3 dark:bg-blue-900">
                                        <span className="text-xl">👥</span>
                                    </div>
                                </div>
                            </div>

                            <div className="rounded-lg border bg-white p-6 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <div className="flex items-center justify-between">
                                    <div>
                                        <p className="text-sm font-medium text-gray-500 dark:text-gray-400">Total Revenue</p>
                                        <p className="text-2xl font-bold text-green-600">RM {stats.totalRevenue || 0}</p>
                                    </div>
                                    <div className="rounded-full bg-green-100 p-3 dark:bg-green-900">
                                        <span className="text-xl">💵</span>
                                    </div>
                                </div>
                            </div>

                            <div className="rounded-lg border bg-white p-6 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <div className="flex items-center justify-between">
                                    <div>
                                        <p className="text-sm font-medium text-gray-500 dark:text-gray-400">Unpaid Invoices</p>
                                        <p className="text-2xl font-bold text-red-600">{stats.unpaidInvoices || 0}</p>
                                    </div>
                                    <div className="rounded-full bg-red-100 p-3 dark:bg-red-900">
                                        <span className="text-xl">📋</span>
                                    </div>
                                </div>
                            </div>

                            <div className="rounded-lg border bg-white p-6 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <div className="flex items-center justify-between">
                                    <div>
                                        <p className="text-sm font-medium text-gray-500 dark:text-gray-400">Pending Payments</p>
                                        <p className="text-2xl font-bold text-orange-600">{stats.pendingPayments || 0}</p>
                                    </div>
                                    <div className="rounded-full bg-orange-100 p-3 dark:bg-orange-900">
                                        <span className="text-xl">⏳</span>
                                    </div>
                                </div>
                            </div>
                        </>
                    )}
                </div>

                {/* Quick Actions */}
                <div className="rounded-lg border bg-white p-6 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <h2 className="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Quick Actions</h2>
                    <div className="grid grid-cols-2 gap-4 md:grid-cols-4">
                        {isAdmin && (
                            <>
                                <Link
                                    href={route('users.create')}
                                    className="flex flex-col items-center justify-center rounded-lg bg-blue-50 p-4 hover:bg-blue-100 transition-colors dark:bg-blue-900/20 dark:hover:bg-blue-900/30"
                                >
                                    <span className="text-2xl mb-2">➕</span>
                                    <span className="text-sm font-medium text-blue-700 dark:text-blue-300">Add User</span>
                                </Link>
                                
                                <Link
                                    href={route('students.create')}
                                    className="flex flex-col items-center justify-center rounded-lg bg-green-50 p-4 hover:bg-green-100 transition-colors dark:bg-green-900/20 dark:hover:bg-green-900/30"
                                >
                                    <span className="text-2xl mb-2">🎓</span>
                                    <span className="text-sm font-medium text-green-700 dark:text-green-300">Add Student</span>
                                </Link>
                            </>
                        )}
                        
                        <Link
                            href={route('students.index')}
                            className="flex flex-col items-center justify-center rounded-lg bg-purple-50 p-4 hover:bg-purple-100 transition-colors dark:bg-purple-900/20 dark:hover:bg-purple-900/30"
                        >
                            <span className="text-2xl mb-2">👥</span>
                            <span className="text-sm font-medium text-purple-700 dark:text-purple-300">View Students</span>
                        </Link>
                        
                        {isAdmin && (
                            <Link
                                href={route('users.index')}
                                className="flex flex-col items-center justify-center rounded-lg bg-orange-50 p-4 hover:bg-orange-100 transition-colors dark:bg-orange-900/20 dark:hover:bg-orange-900/30"
                            >
                                <span className="text-2xl mb-2">👤</span>
                                <span className="text-sm font-medium text-orange-700 dark:text-orange-300">Manage Users</span>
                            </Link>
                        )}
                    </div>
                </div>

                {/* Recent Activities */}
                {((recentActivities.recentInvoices?.length || 0) > 0 || (recentActivities.recentPayments?.length || 0) > 0) && (
                    <div className="grid gap-6 md:grid-cols-2">
                        {(recentActivities.recentInvoices?.length || 0) > 0 && (
                            <div className="rounded-lg border bg-white p-6 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <h3 className="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Recent Invoices</h3>
                                <div className="space-y-3">
                                    {recentActivities.recentInvoices?.slice(0, 5).map((invoice) => (
                                        <div key={invoice.id} className="flex items-center justify-between">
                                            <div>
                                                <p className="font-medium text-gray-900 dark:text-white">
                                                    {invoice.invoice_number}
                                                </p>
                                                <p className="text-sm text-gray-500 dark:text-gray-400">
                                                    {isStudent ? invoice.fee_type?.name : invoice.student?.user?.name}
                                                </p>
                                            </div>
                                            <div className="text-right">
                                                <p className="font-medium text-gray-900 dark:text-white">RM {invoice.amount}</p>
                                                <span className={`text-xs px-2 py-1 rounded-full ${
                                                    invoice.status === 'paid' 
                                                        ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200'
                                                        : invoice.status === 'unpaid'
                                                        ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200'
                                                        : 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200'
                                                }`}>
                                                    {invoice.status}
                                                </span>
                                            </div>
                                        </div>
                                    ))}
                                </div>
                            </div>
                        )}

                        {(recentActivities.recentPayments?.length || 0) > 0 && (
                            <div className="rounded-lg border bg-white p-6 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <h3 className="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Recent Payments</h3>
                                <div className="space-y-3">
                                    {recentActivities.recentPayments?.slice(0, 5).map((payment) => (
                                        <div key={payment.id} className="flex items-center justify-between">
                                            <div>
                                                <p className="font-medium text-gray-900 dark:text-white">
                                                    {payment.receipt_number}
                                                </p>
                                                <p className="text-sm text-gray-500 dark:text-gray-400">
                                                    {isStudent ? payment.method : payment.student?.user?.name}
                                                </p>
                                            </div>
                                            <div className="text-right">
                                                <p className="font-medium text-gray-900 dark:text-white">RM {payment.amount}</p>
                                                <span className={`text-xs px-2 py-1 rounded-full ${
                                                    payment.status === 'paid' 
                                                        ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200'
                                                        : payment.status === 'pending'
                                                        ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200'
                                                        : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200'
                                                }`}>
                                                    {payment.status}
                                                </span>
                                            </div>
                                        </div>
                                    ))}
                                </div>
                            </div>
                        )}
                    </div>
                )}
            </div>
        </AppLayout>
    );
}