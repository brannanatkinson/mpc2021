<div>
    <table>
        <th>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Gift Total</td>
            <td>Address</td>
            <td>Address 2</td>
            <td>City</td>
            <td>State</td>
            <td>Zip</td>
        </th>
        @foreach ($donors as $donor)
        <tr>
            <td>{{ $donor->id }}</td>
            <td>{{ $donor->full_name  }}</td>
            <td>{{ $donor->email_address  }}</td>
         
            <td>${{ $donor->gift  }}</td>
            <td>{{ $donor->address  }}</td>
            <td>{{ $donor->address_2  }}</td>
            <td>{{ $donor->city  }}</td>
            <td>{{ $donor->state  }}</td>
            <td>{{ $donor->postal_code  }}</td>

        </tr>
        @endforeach
    </table>
    
    
</div>
