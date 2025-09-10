import { type SharedData } from '@/types';
import { Head, Link, usePage } from '@inertiajs/react';

export default function Welcome() {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
            <Head title="College Management System">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
            </Head>
            <div className="flex min-h-screen flex-col items-center bg-gradient-to-br from-blue-50 to-indigo-100 p-6 text-gray-900 lg:justify-center lg:p-8 dark:from-gray-900 dark:to-gray-800 dark:text-white">
                <header className="mb-6 w-full max-w-6xl">
                    <nav className="flex items-center justify-between">
                        <div className="flex items-center space-x-2">
                            <div className="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600 text-white">
                                🎓
                            </div>
                            <span className="text-xl font-bold">EduManage</span>
                        </div>
                        <div className="flex gap-4">
                            {auth.user ? (
                                <Link
                                    href={route('dashboard')}
                                    className="inline-block rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white shadow-lg hover:bg-blue-700 transition-colors"
                                >
                                    Go to Dashboard
                                </Link>
                            ) : (
                                <>
                                    <Link
                                        href={route('login')}
                                        className="inline-block rounded-lg border border-blue-600 px-6 py-3 font-semibold text-blue-600 hover:bg-blue-50 transition-colors dark:border-blue-400 dark:text-blue-400 dark:hover:bg-gray-800"
                                    >
                                        Login
                                    </Link>
                                    <Link
                                        href={route('register')}
                                        className="inline-block rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white shadow-lg hover:bg-blue-700 transition-colors"
                                    >
                                        Register
                                    </Link>
                                </>
                            )}
                        </div>
                    </nav>
                </header>

                <div className="flex w-full max-w-6xl items-center justify-center">
                    <main className="text-center">
                        <div className="mb-8">
                            <h1 className="mb-6 text-5xl font-bold text-gray-900 dark:text-white">
                                🎓 College Management System
                            </h1>
                            <p className="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                                Complete solution for managing students, fees, payments, and academic records. 
                                Streamline your educational institution's operations with our comprehensive platform.
                            </p>
                        </div>

                        <div className="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4 mb-12">
                            <div className="rounded-lg bg-white p-6 shadow-lg dark:bg-gray-800">
                                <div className="mb-4 text-4xl">👥</div>
                                <h3 className="mb-2 font-semibold text-lg">User Management</h3>
                                <p className="text-sm text-gray-600 dark:text-gray-300">
                                    Manage admins, staff, and students with role-based access control
                                </p>
                            </div>

                            <div className="rounded-lg bg-white p-6 shadow-lg dark:bg-gray-800">
                                <div className="mb-4 text-4xl">📊</div>
                                <h3 className="mb-2 font-semibold text-lg">Student Records</h3>
                                <p className="text-sm text-gray-600 dark:text-gray-300">
                                    Complete student profiles with academic and personal information
                                </p>
                            </div>

                            <div className="rounded-lg bg-white p-6 shadow-lg dark:bg-gray-800">
                                <div className="mb-4 text-4xl">💳</div>
                                <h3 className="mb-2 font-semibold text-lg">Fee Management</h3>
                                <p className="text-sm text-gray-600 dark:text-gray-300">
                                    Invoice generation, payment tracking, and financial reporting
                                </p>
                            </div>

                            <div className="rounded-lg bg-white p-6 shadow-lg dark:bg-gray-800">
                                <div className="mb-4 text-4xl">💰</div>
                                <h3 className="mb-2 font-semibold text-lg">Fund Tracking</h3>
                                <p className="text-sm text-gray-600 dark:text-gray-300">
                                    Monitor scholarships, loans, and financial aid programs
                                </p>
                            </div>
                        </div>

                        <div className="rounded-lg bg-white p-8 shadow-lg dark:bg-gray-800 mb-8">
                            <h2 className="mb-4 text-2xl font-bold">Key Features</h2>
                            <div className="grid grid-cols-1 gap-4 md:grid-cols-2 text-left">
                                <div className="flex items-start space-x-3">
                                    <div className="flex-shrink-0 text-green-500">✓</div>
                                    <div>
                                        <h4 className="font-semibold">Role-Based Access</h4>
                                        <p className="text-sm text-gray-600 dark:text-gray-300">
                                            Admin, staff, and student roles with appropriate permissions
                                        </p>
                                    </div>
                                </div>
                                <div className="flex items-start space-x-3">
                                    <div className="flex-shrink-0 text-green-500">✓</div>
                                    <div>
                                        <h4 className="font-semibold">Invoice Management</h4>
                                        <p className="text-sm text-gray-600 dark:text-gray-300">
                                            Generate and track tuition, hostel, and other fee invoices
                                        </p>
                                    </div>
                                </div>
                                <div className="flex items-start space-x-3">
                                    <div className="flex-shrink-0 text-green-500">✓</div>
                                    <div>
                                        <h4 className="font-semibold">Payment Processing</h4>
                                        <p className="text-sm text-gray-600 dark:text-gray-300">
                                            Track cash, bank transfer, and online payments
                                        </p>
                                    </div>
                                </div>
                                <div className="flex items-start space-x-3">
                                    <div className="flex-shrink-0 text-green-500">✓</div>
                                    <div>
                                        <h4 className="font-semibold">Financial Reports</h4>
                                        <p className="text-sm text-gray-600 dark:text-gray-300">
                                            Account statements and comprehensive reporting
                                        </p>
                                    </div>
                                </div>
                                <div className="flex items-start space-x-3">
                                    <div className="flex-shrink-0 text-green-500">✓</div>
                                    <div>
                                        <h4 className="font-semibold">Fund Management</h4>
                                        <p className="text-sm text-gray-600 dark:text-gray-300">
                                            Track PTPTN, scholarships, and other financial aid
                                        </p>
                                    </div>
                                </div>
                                <div className="flex items-start space-x-3">
                                    <div className="flex-shrink-0 text-green-500">✓</div>
                                    <div>
                                        <h4 className="font-semibold">Student Portal</h4>
                                        <p className="text-sm text-gray-600 dark:text-gray-300">
                                            Students can view invoices and make payments online
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {!auth.user && (
                            <div className="space-y-4">
                                <p className="text-lg font-semibold text-gray-700 dark:text-gray-300">
                                    Ready to get started?
                                </p>
                                <div className="flex justify-center space-x-4">
                                    <Link
                                        href={route('register')}
                                        className="inline-block rounded-lg bg-blue-600 px-8 py-4 font-bold text-white shadow-lg hover:bg-blue-700 transition-colors text-lg"
                                    >
                                        🚀 Start Managing Today
                                    </Link>
                                    <Link
                                        href={route('login')}
                                        className="inline-block rounded-lg border-2 border-blue-600 px-8 py-4 font-bold text-blue-600 hover:bg-blue-50 transition-colors text-lg dark:border-blue-400 dark:text-blue-400 dark:hover:bg-gray-800"
                                    >
                                        Login to Account
                                    </Link>
                                </div>
                            </div>
                        )}

                        <footer className="mt-12 text-sm text-gray-500 dark:text-gray-400">
                            Built with ❤️ by{" "}
                            <a 
                                href="https://app.build" 
                                target="_blank" 
                                className="font-medium text-blue-600 hover:underline dark:text-blue-400"
                            >
                                app.build
                            </a>
                        </footer>
                    </main>
                </div>
            </div>
        </>
    );
}