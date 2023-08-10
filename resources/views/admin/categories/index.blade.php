<x-admin.layout.master>

    @slot('title')
        Category
    @endslot
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Catogory</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard1') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">CategoryList</li>
                </ol>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#cateoryModal">
                    Add Cateory
                </button>
                {{-- <button id="addCategoryBtn" class="btn btn-primary btn-sm">Add Category</button> --}}
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <x-alert-message.alert />
            <table id="dataTable" class="table">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                        <!-- Add more table headers as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->is_active }}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#cateoryUpdateModal">
                                    Edit
                                </button>
                                <button class="btn btn-danger btn-sm deleteCategory"
                                    data-id="{{ $category->id }}">Delete</button>
                            </td>
                        </tr>

                        <div class="modal fade" id="cateoryUpdateModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-success text-white center">
                                        Category Update
                                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="errorDiv">

                                        </div>
                                        <form class="row g-3"
                                            action="{{ route('categories.update', ['category' => $category->id]) }}"
                                            method="post">

                                            @csrf
                                            @method('PATCH')
                                            <br>
                                            <div class="col-md-12">
                                                <label class="form-check-label" for="title">
                                                    Title
                                                </label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    value="{{ $category->title }}">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-check-label" for="description">
                                                    Description
                                                </label>
                                                <input type="text" class="form-control" id="description"
                                                    name="description" value="{{ $category->description }}">
                                            </div>

                                            <div class="form-check">
                                                <input name="is_active" class="form-check-input" type="checkbox"
                                                    value="1" id="isActive"
                                                    {{ $category->is_active ? 'checked' : '' }}>
                                                <label class="form-check-label" for="isActive">
                                                    Is Active
                                                </label>
                                            </div>


                                    </div>
                                    <div class="modal-footer shadow">
                                        <button type="submit"
                                            class="btn btn-success m-auto w-50 add_category btn-sm ">Update <i
                                                class="fa-solid fa-paper-plane"></i></button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>






        </section>

    </main><!-- End #main -->






    {{-- add category modal form --}}
    <x-admin.modal.category_add_modal />

    <!-- Add jQuery library (you can host it or use a CDN) -->




    <x-admin.ajax.category_ajax />
</x-admin.layout.master>
