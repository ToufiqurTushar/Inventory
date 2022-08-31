<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.food_entries.index_title')
                </h4>
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
                                    placeholder="{{ __('crud.common.search') }}"
                                    value="{{ $search ?? '' }}"
                                    class="form-control"
                                    autocomplete="off"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="fa fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        @can('create', App\Models\FoodEntry::class)
                        <a
                            href="{{ route('food-entries.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="icon ion-md-add"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.food_entries.inputs.product_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.food_entries.inputs.image')
                            </th>
                            <th class="text-right">
                                @lang('crud.food_entries.inputs.production_cost')
                            </th>
                            <th class="text-right">
                                @lang('crud.food_entries.inputs.sale_cost')
                            </th>
                            <th class="text-right">
                                @lang('crud.food_entries.inputs.member_discount')
                            </th>
                            <th class="text-right">
                                @lang('crud.food_entries.inputs.special_discount')
                            </th>
                            <th class="text-right">
                                @lang('crud.food_entries.inputs.others_discount')
                            </th>
                            <th class="text-left">
                                @lang('crud.food_entries.inputs.created_by_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($foodEntries as $foodEntry)
                        <tr>
                            <td>{{ $foodEntry->product_name ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $foodEntry->image ? \Storage::url($foodEntry->image) : '' }}"
                                />
                            </td>
                            <td>{{ $foodEntry->production_cost ?? '-' }}</td>
                            <td>{{ $foodEntry->sale_cost ?? '-' }}</td>
                            <td>{{ $foodEntry->member_discount ?? '-' }}</td>
                            <td>{{ $foodEntry->special_discount ?? '-' }}</td>
                            <td>{{ $foodEntry->others_discount ?? '-' }}</td>
                            <td>{{ $foodEntry->created_by_id ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $foodEntry)
                                    <a
                                        href="{{ route('food-entries.edit', $foodEntry) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $foodEntry)
                                    <a
                                        href="{{ route('food-entries.show', $foodEntry) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $foodEntry)
                                    <form
                                        action="{{ route('food-entries.destroy', $foodEntry) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9">{!! $foodEntries->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app>
