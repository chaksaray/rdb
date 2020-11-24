@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">Pages List</h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input
                                    id="indexSearch"
                                    type="text"
                                    name="search"
                                    placeholder="Search..."
                                    value="{{ $search ?? '' }}"
                                    class="form-control"
                                    autocomplete="off"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="icon ion-md-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        <a
                            href="{{ route('pages.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="icon ion-md-add"></i> Create
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Website</th>
                            <th>Profile</th>
                            <th>Cover</th>
                            <th>User Name</th>
                            <th>Created By</th>
                            <th>Custom Url</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pages as $page)
                        <tr>
                            <td>
                                {{ optional($page->category)->title ?? '-' }}
                            </td>
                            <td>{{ optional($page->status)->name ?? '-' }}</td>
                            <td>{{ $page->name ?? '-' }}</td>
                            <td>{{ $page->description ?? '-' }}</td>
                            <td>{{ $page->website ?? '-' }}</td>
                            <td>{{ $page->profile ?? '-' }}</td>
                            <td>{{ $page->cover ?? '-' }}</td>
                            <td>{{ $page->user_name ?? '-' }}</td>
                            <td>{{ $page->created_by ?? '-' }}</td>
                            <td>{{ $page->custom_url ?? '-' }}</td>
                            <td>{{ $page->phone ?? '-' }}</td>
                            <td>{{ $page->email ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    <a href="{{ route('pages.edit', $page) }}">
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>

                                    <a href="{{ route('pages.show', $page) }}">
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>

                                    <form
                                        action="{{ route('pages.destroy', $page) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure?')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="13">No items found</td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="13">{!! $pages->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
