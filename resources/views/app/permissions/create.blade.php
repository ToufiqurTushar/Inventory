<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('permissions.index') }}" class="mr-4"
                    ><i class="fa fa-arrow-left"></i
                ></a>
                @lang('crud.permissions.create_title')
            </h4>

            <x-form
                method="POST"
                action="{{ route('permissions.store') }}"
                class="mt-4"
            >
                @include('app.permissions.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('permissions.index') }}"
                        class="btn btn-light"
                    >
                        <i class="fa fa-arrow-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="fa fa-floppy-disk"></i>
                        @lang('crud.common.create')
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
</x-app>
