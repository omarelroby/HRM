<style>
    /* Modal Styling */
    .modal-content {
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .modal-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
        padding: 15px 20px;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .modal-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #333;
    }

    .modal-body {
        padding: 20px;
    }

    /* Table Styling */
    .plan-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    .plan-table th,
    .plan-table td {
        padding: 12px 15px;
        text-align: left;
        vertical-align: middle;
    }

    .plan-table th {
        font-weight: 600;
        color: #555;
        background-color: #f8f9fa;
        border-bottom: 2px solid #e9ecef;
    }

    .plan-table tbody tr {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .plan-table tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .plan-table td h6 {
        font-size: 1rem;
        font-weight: 600;
        color: #333;
        margin: 0;
    }

    .plan-table td {
        color: #555;
    }

    /* Badge Styles */
    .badge-active {
        background-color: #08c65b;
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 500;
    }

    /* Button Styles */
    .btn-upgrade {
        background-color: #007bff;
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 500;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-upgrade:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
    }
</style>


    <div class="modal-body">
        <table class="plan-table">
            <thead>
            <tr>
                <th>Plan</th>
                <th>Users</th>
                <th>Employees</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($plans as $plan)
                <tr>
                    <td>
                        <h6>{{ $plan->name }} {{ (!empty(env('CURRENCY_SYMBOL')) ? env('CURRENCY_SYMBOL') : '$') . $plan->price }} / {{ $plan->duration }}</h6>
                    </td>
                    <td>{{ __('Users') }} : {{ $plan->max_users }}</td>
                    <td>{{ __('Employees') }} : {{ $plan->max_employees }}</td>
                    <td>
                        @if($user->plan == $plan->id)
                            <span class="badge-active">
                                    <i class="ti ti-checks"></i> Active
                                </span>
                        @else
                            <a href="{{ route('plan.active', [$user->id, $plan->id]) }}" class="btn-upgrade">
                                <i class="ti ti-shopping-cart-plus"></i> Upgrade
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

