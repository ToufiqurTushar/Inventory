<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('member-types.index') }}" class="mr-4"
                    ><i class="fa fa-arrow-left"></i
                ></a>
                @lang('crud.member_types.edit_title')
            </h4>

            <x-form
                method="PUT"
                action="{{ route('member-types.update', $memberType) }}"
                class="mt-4"
            >
                @include('app.member_types.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('member-types.index') }}"
                        class="btn btn-light"
                    >
                        <i class="fa fa-arrow-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <a
                        href="{{ route('member-types.create') }}"
                        class="btn btn-light"
                    >
                        <i class="fa fa-plus text-primary"></i>
                        @lang('crud.common.create')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="fa fa-floppy-disk"></i>
                        @lang('crud.common.update')
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
</x-app>
