@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th># of Orders</th>
            </tr>
        </thead>
            <tbody>
                {{-- Details go here --}}
                @foreach ($customers as $customer)
                    <tr>
                        <td>
                            <a href="{{action('CustomerDetailsController@show',$customer->id) }}">
                                {{ $customer->first_name }}
                                {{ $customer->last_name }}
                            </a>
                        </td>
                        <td>
                            {{ $customer->order_count }}
                        </td>
                    </tr>
                @endforeach
                    <tr>
                        <td colspan="2">
                            
                        </td>
                    </tr>
            </tbody>
    </table>
@endsection
