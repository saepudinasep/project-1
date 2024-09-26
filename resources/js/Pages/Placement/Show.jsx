import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link } from "@inertiajs/react";



export default function show({ auth, placements, success }) {

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <div className="flex justify-between items-center">
                    <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Placements Show
                    </h2>
                </div>
            }
        >
            <Head title="Placements" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    {success && (
                        <div className="bg-emerald-500 py-2 px-4 text-white rounded mb-4">
                            {success}
                        </div>
                    )}

                    <div className="flex flex-wrap justify-center">
                        <div className="w-full p-6">
                            <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div className="p-6 text-gray-900 dark:text-gray-100">
                                    <div className="overflow-auto">
                                        <table className="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b-2 border-gray-500">
                                                <tr className="text-nowrap">
                                                    <th className="px-3 py-3">ID</th>
                                                    <th className="px-3 py-3">Branch Name</th>
                                                    <th className="px-3 py-3">Kas Kode</th>
                                                    <th className="px-3 py-3">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {placements.data.map((placement) => (
                                                    <tr className="bg-white border-b dark:bg-gray-800 dark:border-gray-700" key={placement.id}>
                                                        <td className="px-3 py-2">{placement.id}</td>
                                                        <td className="px-3 py-2">
                                                            <Link href={route("placement.show", placement.branch.id)} >
                                                                {placement.branch.name}
                                                            </Link>
                                                        </td>
                                                        <td className="px-3 py-2">{placement.kas.name}</td>
                                                        <td className="px-3 py-2">Action</td>
                                                    </tr>
                                                ))}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="w-full p-6 text-center">
                            <button className="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mx-2">
                                Add New
                            </button>
                            <button className="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-2">
                                Delete
                            </button>
                        </div>
                        <div className="w-full p-6">
                            <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div className="p-6 text-gray-900 dark:text-gray-100">
                                    <div className="overflow-auto">
                                        <table className="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b-2 border-gray-500">
                                                <tr className="text-nowrap">
                                                    <th className="px-3 py-3">ID</th>
                                                    <th className="px-3 py-3">Branch Name</th>
                                                    <th className="px-3 py-3">Kas Kode</th>
                                                    <th className="px-3 py-3">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {placements.data.map((placement) => (
                                                    <tr className="bg-white border-b dark:bg-gray-800 dark:border-gray-700" key={placement.id}>
                                                        <td className="px-3 py-2">{placement.id}</td>
                                                        <td className="px-3 py-2">
                                                            <Link href={route("placement.show", placement.branch.id)} >
                                                                {placement.branch.name}
                                                            </Link>
                                                        </td>
                                                        <td className="px-3 py-2">{placement.kas.name}</td>
                                                        <td className="px-3 py-2">Action</td>
                                                    </tr>
                                                ))}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </AuthenticatedLayout>
    )

}
