<?php

namespace Database\Seeders;

use App\Models\FeeType;
use App\Models\Fund;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\PaymentItem;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CollegeManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        $admin = User::create([
            'name' => 'System Administrator',
            'email' => 'admin@college.edu',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create Staff Users
        $staff1 = User::create([
            'name' => 'Jane Smith',
            'email' => 'staff1@college.edu',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'email_verified_at' => now(),
        ]);

        $staff2 = User::create([
            'name' => 'Mike Johnson',
            'email' => 'staff2@college.edu',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'email_verified_at' => now(),
        ]);

        // Create Student Users
        $student1User = User::create([
            'name' => 'Alice Johnson',
            'email' => 'alice@student.college.edu',
            'password' => Hash::make('password'),
            'role' => 'student',
            'email_verified_at' => now(),
        ]);

        $student2User = User::create([
            'name' => 'Bob Smith',
            'email' => 'bob@student.college.edu',
            'password' => Hash::make('password'),
            'role' => 'student',
            'email_verified_at' => now(),
        ]);

        $student3User = User::create([
            'name' => 'Carol Davis',
            'email' => 'carol@student.college.edu',
            'password' => Hash::make('password'),
            'role' => 'student',
            'email_verified_at' => now(),
        ]);

        // Create Students
        $student1 = Student::create([
            'user_id' => $student1User->id,
            'id_no' => 'STU001',
            'matric_no' => 'CS202301',
            'phone' => '+60123456789',
            'address' => '123 Student Street, Kuala Lumpur',
            'guardian_name' => 'John Johnson',
            'guardian_phone' => '+60198765432',
        ]);

        $student2 = Student::create([
            'user_id' => $student2User->id,
            'id_no' => 'STU002',
            'matric_no' => 'IT202302',
            'phone' => '+60123456790',
            'address' => '456 Campus Road, Petaling Jaya',
            'guardian_name' => 'Mary Smith',
            'guardian_phone' => '+60198765433',
        ]);

        $student3 = Student::create([
            'user_id' => $student3User->id,
            'id_no' => 'STU003',
            'matric_no' => 'ENG202303',
            'phone' => '+60123456791',
            'address' => '789 University Lane, Shah Alam',
            'guardian_name' => 'David Davis',
            'guardian_phone' => '+60198765434',
        ]);

        // Create Fee Types
        $tuitionFee = FeeType::create([
            'name' => 'Tuition Fee',
            'category' => 'tuition',
            'frequency' => 'semester',
            'amount_default' => 5000.00,
        ]);

        $hostelFee = FeeType::create([
            'name' => 'Hostel Fee',
            'category' => 'hostel',
            'frequency' => 'semester',
            'amount_default' => 2000.00,
        ]);

        $transportFee = FeeType::create([
            'name' => 'Transport Fee',
            'category' => 'transport',
            'frequency' => 'monthly',
            'amount_default' => 200.00,
        ]);

        $registrationFee = FeeType::create([
            'name' => 'Registration Fee',
            'category' => 'registration',
            'frequency' => 'one_time',
            'amount_default' => 500.00,
        ]);

        $examFee = FeeType::create([
            'name' => 'Examination Fee',
            'category' => 'others',
            'frequency' => 'semester',
            'amount_default' => 300.00,
        ]);

        // Create Invoices for Students
        $invoices = [
            // Student 1 Invoices
            Invoice::create([
                'student_id' => $student1->id,
                'fee_type_id' => $tuitionFee->id,
                'amount' => 5000.00,
                'status' => 'unpaid',
                'invoice_date' => now()->subDays(30),
                'invoice_number' => 'INV-2024001',
                'generated_by' => $admin->id,
            ]),
            Invoice::create([
                'student_id' => $student1->id,
                'fee_type_id' => $hostelFee->id,
                'amount' => 2000.00,
                'status' => 'paid',
                'invoice_date' => now()->subDays(25),
                'invoice_number' => 'INV-2024002',
                'generated_by' => $staff1->id,
            ]),
            
            // Student 2 Invoices
            Invoice::create([
                'student_id' => $student2->id,
                'fee_type_id' => $tuitionFee->id,
                'amount' => 5000.00,
                'status' => 'paid',
                'invoice_date' => now()->subDays(20),
                'invoice_number' => 'INV-2024003',
                'generated_by' => $admin->id,
            ]),
            Invoice::create([
                'student_id' => $student2->id,
                'fee_type_id' => $transportFee->id,
                'amount' => 600.00,
                'status' => 'unpaid',
                'invoice_date' => now()->subDays(15),
                'invoice_number' => 'INV-2024004',
                'generated_by' => $staff2->id,
            ]),
            
            // Student 3 Invoices
            Invoice::create([
                'student_id' => $student3->id,
                'fee_type_id' => $registrationFee->id,
                'amount' => 500.00,
                'status' => 'paid',
                'invoice_date' => now()->subDays(10),
                'invoice_number' => 'INV-2024005',
                'generated_by' => $admin->id,
            ]),
        ];

        // Create Payments
        $payment1 = Payment::create([
            'student_id' => $student1->id,
            'amount' => 2000.00,
            'method' => 'bank_transfer',
            'status' => 'paid',
            'payment_date' => now()->subDays(20),
            'receipt_number' => 'RCP-2024001',
            'received_by' => $staff1->id,
        ]);

        $payment2 = Payment::create([
            'student_id' => $student2->id,
            'amount' => 5000.00,
            'method' => 'online',
            'status' => 'paid',
            'payment_date' => now()->subDays(15),
            'receipt_number' => 'RCP-2024002',
            'received_by' => $staff2->id,
        ]);

        $payment3 = Payment::create([
            'student_id' => $student3->id,
            'amount' => 500.00,
            'method' => 'cash',
            'status' => 'paid',
            'payment_date' => now()->subDays(5),
            'receipt_number' => 'RCP-2024003',
            'received_by' => $admin->id,
        ]);

        // Create Payment Items (linking payments to invoices)
        PaymentItem::create([
            'payment_id' => $payment1->id,
            'invoice_id' => $invoices[1]->id, // Hostel fee for student 1
            'amount' => 2000.00,
        ]);

        PaymentItem::create([
            'payment_id' => $payment2->id,
            'invoice_id' => $invoices[2]->id, // Tuition fee for student 2
            'amount' => 5000.00,
        ]);

        PaymentItem::create([
            'payment_id' => $payment3->id,
            'invoice_id' => $invoices[4]->id, // Registration fee for student 3
            'amount' => 500.00,
        ]);

        // Create Funds
        Fund::create([
            'student_id' => $student1->id,
            'sponsor_type' => 'PTPTN',
            'sponsor_name' => null,
            'amount' => 8000.00,
            'disbursement_date' => now()->subDays(45),
            'status' => 'received',
            'remarks' => 'Semester 1 loan disbursement',
        ]);

        Fund::create([
            'student_id' => $student2->id,
            'sponsor_type' => 'Scholarship',
            'sponsor_name' => null,
            'amount' => 3000.00,
            'disbursement_date' => now()->subDays(30),
            'status' => 'received',
            'remarks' => 'Academic Excellence Scholarship',
        ]);

        Fund::create([
            'student_id' => $student3->id,
            'sponsor_type' => 'Others',
            'sponsor_name' => 'ABC Foundation',
            'amount' => 2500.00,
            'disbursement_date' => now()->subDays(20),
            'status' => 'pending',
            'remarks' => 'Foundation scholarship pending verification',
        ]);

        Fund::create([
            'student_id' => $student1->id,
            'sponsor_type' => 'MARA',
            'sponsor_name' => null,
            'amount' => 1500.00,
            'disbursement_date' => now()->subDays(10),
            'status' => 'received',
            'remarks' => 'Additional support fund',
        ]);
    }
}