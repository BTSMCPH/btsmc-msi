<x-app-layout>
    <x-slot name="header">
        {{ __('Content') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="relative overflow-hidden rounded-lg shadow-md">
            <table class="w-full text-left border border-collapse border-gray-300 rounded-lg table-auto">
                <thead>
                    <tr class="text-white bg-[#3f9edf]">
                        <th class="p-4 text-center border border-gray-300">Product-ID</th>
                        <th class="p-4 text-center border border-gray-300">Description</th>
                        <th class="p-4 text-center border border-gray-300">Price</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 bg-white">
                    <tr>
                        <td class="p-4 text-center border border-gray-300">YY-853581</td>
                        <td class="p-4 text-center border border-gray-300">Notebook Basic</td>
                        <td class="p-4 text-center border border-gray-300">$299</td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="p-4 text-center border border-gray-300">YY-853599</td>
                        <td class="p-4 text-center border border-gray-300">Notebook Pro</td>
                        <td class="p-4 text-center border border-gray-300">$849</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
