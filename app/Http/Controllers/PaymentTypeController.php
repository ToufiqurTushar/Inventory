<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentTypeStoreRequest;
use App\Http\Requests\PaymentTypeUpdateRequest;

class PaymentTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', PaymentType::class);

        $search = $request->get('search', '');

        $paymentTypes = PaymentType::search($search)->orderBy('id')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'app.payment_types.index',
            compact('paymentTypes', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', PaymentType::class);

        return view('app.payment_types.create');
    }

    /**
     * @param \App\Http\Requests\PaymentTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentTypeStoreRequest $request)
    {
        $this->authorize('create', PaymentType::class);

        $validated = $request->validated();

        $paymentType = PaymentType::create($validated);

        return redirect()
            ->route('payment-types.edit', $paymentType)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaymentType $paymentType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PaymentType $paymentType)
    {
        $this->authorize('view', $paymentType);

        return view('app.payment_types.show', compact('paymentType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaymentType $paymentType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PaymentType $paymentType)
    {
        $this->authorize('update', $paymentType);

        return view('app.payment_types.edit', compact('paymentType'));
    }

    /**
     * @param \App\Http\Requests\PaymentTypeUpdateRequest $request
     * @param \App\Models\PaymentType $paymentType
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        PaymentType $paymentType
    ) {
        $validated = $request->validate([
            'name' => [
                'required',
                'unique:payment_types,name,'.$paymentType->id,
                'max:255',
                'string',
            ],
            'commission_rate' => ['required', 'numeric'],
        ]);

        if($paymentType->id == 1 || $paymentType->id == 2) return redirect()
            ->route('payment-types.edit', $paymentType)
            ->withError("Can't be changed !");

        $this->authorize('update', $paymentType);


        $paymentType->update($validated);

        return redirect()
            ->route('payment-types.edit', $paymentType)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaymentType $paymentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PaymentType $paymentType)
    {
        $this->authorize('delete', $paymentType);

        $paymentType->delete();

        return redirect()
            ->route('payment-types.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
