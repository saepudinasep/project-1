import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import SelectInput from "@/Components/SelectInput";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link, useForm } from "@inertiajs/react";

export default function Create({ auth, branches, kases }) {

    const { data, setData, post, errors, reset } = useForm({
        branch: "",
        kas: "",
    });

    const onSubmit = (e) => {
        e.preventDefault();

        post(route("placement.store"))
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <div className="flex justify-between items-center">
                    <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Adding Placement
                    </h2>
                </div>
            }
        >
            <Head title="Placements" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <form
                            onSubmit={onSubmit}
                            className="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div className="mt-4">
                                <InputLabel
                                    htmlFor="branch"
                                    value="Branch Name"
                                />
                                <SelectInput
                                    id="branch"
                                    name="branch"
                                    className="mt-1 block w-full"
                                    onChange={(e) => setData("branch", e.target.value)}
                                >
                                    <option value="">Select Branch</option>
                                    {branches.map(branch => (
                                        <option value={branch.id} key={branch.id}>{branch.name}</option>
                                    ))}
                                </SelectInput>
                                <InputError
                                    message={errors.branch}
                                    className="mt-2"
                                />
                            </div>
                            <div className="mt-4">
                                <InputLabel
                                    htmlFor="kas"
                                    value="Kas"
                                />
                                <SelectInput
                                    id="kas"
                                    name="kas"
                                    className="mt-1 block w-full"
                                    onChange={(e) => setData("kas", e.target.value)}
                                >
                                    <option value="">Select Kas</option>
                                    {kases.map(kas => (
                                        <option value={kas.id} key={kas.id}>{kas.name}</option>
                                    ))}
                                </SelectInput>
                                <InputError
                                    message={errors.kas}
                                    className="mt-2"
                                />
                            </div>
                            <div className="mt-4 text-right">
                                <Link
                                    href={route("placement.index")}
                                    className="bg-gray-100 py-1 px-3 text-gray-800 rounded shadow transition-all hover:bg-gray-200 mr-2"
                                >
                                    Cancel
                                </Link>
                                <button className="bg-emerald-500 py-1 px-3 text-white rounded shadow transition-all hover:bg-emerald-600">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    )
}
