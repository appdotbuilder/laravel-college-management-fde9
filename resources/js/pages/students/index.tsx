import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/react';

interface Student {
    id: number;
    id_no: string;
    matric_no?: string;
    phone: string;
    created_at: string;
    user: {
        id: number;
        name: string;
        email: string;
    };
    invoices_count?: number;
    payments_count?: number;
    funds_count?: number;
}

interface Props {
    students: {
        data: Student[];
        links: Array<{ url: string; label: string; active: boolean }>;
        meta: { current_page: number; total: number };
    };
    [key: string]: unknown;
}

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/dashboard' },
    { title: 'Students', href: '/students' },
];

export default function StudentsIndex({ students }: Props) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Students Management" />
            
            <div className="p-6">
                <div className="mb-6 flex items-center justify-between">
                    <div>
                        <h1 className="text-2xl font-bold text-gray-900 dark:text-white">🎓 Students Management</h1>
                        <p className="text-gray-600 dark:text-gray-400">Manage student records and information</p>
                    </div>
                    <Link
                        href={route('students.create')}
                        className="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 transition-colors"
                    >
                        ➕ Add New Student
                    </Link>
                </div>

                <div className="rounded-lg border bg-white shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <div className="overflow-x-auto">
                        <table className="w-full">
                            <thead className="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th className="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        Student
                                    </th>
                                    <th className="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        ID Numbers
                                    </th>
                                    <th className="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        Contact
                                    </th>
                                    <th className="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        Records
                                    </th>
                                    <th className="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody className="divide-y divide-gray-200 bg-white dark:divide-gray-600 dark:bg-gray-800">
                                {students.data.map((student) => (
                                    <tr key={student.id} className="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td className="px-6 py-4">
                                            <div>
                                                <div className="font-medium text-gray-900 dark:text-white">
                                                    {student.user.name}
                                                </div>
                                                <div className="text-sm text-gray-500 dark:text-gray-400">
                                                    {student.user.email}
                                                </div>
                                            </div>
                                        </td>
                                        <td className="px-6 py-4">
                                            <div className="text-sm text-gray-900 dark:text-white">
                                                <div>ID: {student.id_no}</div>
                                                {student.matric_no && (
                                                    <div className="text-gray-500 dark:text-gray-400">
                                                        Matric: {student.matric_no}
                                                    </div>
                                                )}
                                            </div>
                                        </td>
                                        <td className="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                            {student.phone}
                                        </td>
                                        <td className="px-6 py-4">
                                            <div className="flex space-x-4 text-sm">
                                                <div className="flex items-center">
                                                    <span className="mr-1">📄</span>
                                                    <span className="text-gray-600 dark:text-gray-400">
                                                        {student.invoices_count || 0} Invoices
                                                    </span>
                                                </div>
                                                <div className="flex items-center">
                                                    <span className="mr-1">💳</span>
                                                    <span className="text-gray-600 dark:text-gray-400">
                                                        {student.payments_count || 0} Payments
                                                    </span>
                                                </div>
                                                <div className="flex items-center">
                                                    <span className="mr-1">💰</span>
                                                    <span className="text-gray-600 dark:text-gray-400">
                                                        {student.funds_count || 0} Funds
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td className="px-6 py-4 text-sm font-medium">
                                            <div className="flex space-x-2">
                                                <Link
                                                    href={route('students.show', student.id)}
                                                    className="text-blue-600 hover:text-blue-800 dark:text-blue-400"
                                                >
                                                    View
                                                </Link>
                                                <Link
                                                    href={route('students.edit', student.id)}
                                                    className="text-green-600 hover:text-green-800 dark:text-green-400"
                                                >
                                                    Edit
                                                </Link>
                                            </div>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                    
                    {students.data.length === 0 && (
                        <div className="py-12 text-center">
                            <div className="text-4xl mb-4">🎓</div>
                            <h3 className="text-lg font-medium text-gray-900 dark:text-white">No students found</h3>
                            <p className="text-gray-500 dark:text-gray-400 mt-2">
                                Get started by adding your first student.
                            </p>
                            <Link
                                href={route('students.create')}
                                className="mt-4 inline-block rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 transition-colors"
                            >
                                Add New Student
                            </Link>
                        </div>
                    )}
                </div>
            </div>
        </AppLayout>
    );
}