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

        <div class="table-responsive mb-2">
            <table class="table table-bordered table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>

    <script>
        $(function() {
            $('.table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('employee.index') }}",
                columns: [{
                        data: 'first_name',
                        name: 'First Name'
                    },
                    {
                        data: 'last_name',
                        name: 'Last Name'
                    },
                    {
                        data: 'gender',
                        name: 'Gender'
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
</x-layout>
