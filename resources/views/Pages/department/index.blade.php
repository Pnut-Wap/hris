<x-layout>
    <div class="card">
        <div class="card-header" hidden>
            <h5 class="mb-0">Highlighting rows and columns</h5>
        </div>

        <div class="card-body" hidden>
            <div class="d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-outline-indigo p-1">
                    <i class="fa-solid fa-plus m-1"></i>
                </button>
            </div>
        </div>

        <div class="mb-2">
            <table class="table">
                <thead class="bg-light">
                    <tr>
                        <th>Department Name</th>
                        <th>Location</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>
</x-layout>

<script>
    $(function() {
        $('.table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('department.index') }}",
            columns: [{
                    data: 'department_name',
                    name: 'Department Name'
                },
                {
                    data: 'location',
                    name: 'Location'
                },
                {
                    data: 'Action',
                    name: 'Action',
                    orderable: false,
                    searchable: false
                },
            ],

        });
    });
</script>
