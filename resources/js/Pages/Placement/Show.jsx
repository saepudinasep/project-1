import Checkbox from "@/Components/Checkbox";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link } from "@inertiajs/react";
import { useState } from "react";
import axios from 'axios';

export default function show({ auth, placements, kases, success }) {

    const [selectedPlacements, setSelectedPlacements] = useState([]);
    const [selectedKases, setSelectedKases] = useState([]);

    const handleAddNew = () => {
        const newPlacements = selectedPlacements.map((id) => {
            return { id, type: 'placement' };
        });
        const newKases = selectedKases.map((id) => {
            return { id, type: 'kas' };
        });
        const newData = [...newPlacements, ...newKases];

        // data gak kekirim ke controller
        axios.post('/new-data', { data: newData })
            .then((response) => {
                console.log(response.data);
                window.location.reload();
            })
            .catch((error) => {
                if (error.response) {
                    console.error('Error response:', error.response.data);
                    console.error('Error status:', error.response.status);
                    console.error('Error headers:', error.response.headers);
                } else if (error.request) {
                    console.error('Error request:', error.request);
                } else {
                    console.error('Error message:', error.message);
                }
                console.error('Error config:', error.config);
            });
    };

    const handleDelete = () => {
        // Fungsi untuk menghapus data yang dipilih
        const deletedPlacements = selectedPlacements.map((id) => {
            return { id, type: 'placement' };
        });
        const deletedKases = selectedKases.map((id) => {
            return { id, type: 'kas' };
        });
        const deletedData = [...deletedPlacements, ...deletedKases];

        // console.log(deletedData);
        // Kirim data ke server untuk dihapus
        // Anda dapat menggunakan axios atau fetch untuk mengirim data ke server
        // Contoh:
        axios.delete('/delete-data', { data: deletedData })
            .then((response) => {
                console.log(response.data);
            })
            .catch((error) => {
                console.error(error);
            });
    };

    const handleCheckboxChange = (id, type) => {
        if (type === 'placement') {
            if (selectedPlacements.includes(id)) {
                setSelectedPlacements(selectedPlacements.filter((selectedId) => selectedId !== id));
            } else {
                setSelectedPlacements([...selectedPlacements, id]);
            }
        } else if (type === 'kas') {
            if (selectedKases.includes(id)) {
                setSelectedKases(selectedKases.filter((selectedId) => selectedId !== id));
            } else {
                setSelectedKases([...selectedKases, id]);
            }
        }
    };

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

                    <div className="flex justify-between">
                        <div className="w-1/2 p-6">
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
                                                        {/* <td className="px-3 py-2">
                                                            <Checkbox value={placement.id} />
                                                        </td> */}
                                                        <td className="px-3 py-2">
                                                            <Checkbox
                                                                value={placement.id}
                                                                onChange={() => handleCheckboxChange(placement.id, 'placement')}
                                                            />
                                                        </td>
                                                    </tr>
                                                ))}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="w-1/3 p-6 flex flex-col justify-center items-center">
                            {/* <button className="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mx-2 mb-2">
                                Add New
                            </button>
                            <button className="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-2">
                                Delete
                            </button> */}
                            <button
                                className="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mx-2 mb-2"
                                onClick={handleAddNew}
                            >
                                Add New
                            </button>

                            <button
                                className="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-2"
                                onClick={handleDelete}
                            >
                                Delete
                            </button>
                        </div>
                        <div className="w-1/2 p-6">
                            <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div className="p-6 text-gray-900 dark:text-gray-100">
                                    <div className="overflow-auto">
                                        <table className="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b-2 border-gray-500">
                                                <tr className="text-nowrap">
                                                    <th className="px-3 py-3">ID</th>
                                                    <th className="px-3 py-3">Kas Kode</th>
                                                    <th className="px-3 py-3">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {kases.data.map((kas) => (
                                                    <tr className="bg-white border-b dark:bg-gray-800 dark:border-gray-700" key={kas.id}>
                                                        <td className="px-3 py-2">{kas.id}</td>
                                                        <td className="px-3 py-2">{kas.name}</td>
                                                        {/* <td className="px-3 py-2">
                                                            <Checkbox value={kas.id} />
                                                        </td> */}
                                                        <td className="px-3 py-2">
                                                            <Checkbox
                                                                value={kas.id}
                                                                onChange={() => handleCheckboxChange(kas.id, 'kas')}
                                                            />
                                                        </td>
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
