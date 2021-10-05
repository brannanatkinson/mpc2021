<div>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gift Total</th>
            <th>Address</th>
            <th>Address 2</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
        </tr>
        @foreach ($donors as $donor)
        <tr>
            <td>{{ $donor->id }}</td>
            <td>{{ $donor->full_name  }}</td>
            <td>{{ $donor->email_address  }}</td>
         
            <td>${{ $donor->gift->gift_total  }}</td>
            <td>{{ $donor->address  }}</td>
            <td>{{ $donor->address_2  }}</td>
            <td>{{ $donor->city  }}</td>
            <td>{{ $donor->state  }}</td>
            <td>{{ $donor->postal_code  }}</td>

        </tr>
        @endforeach
    </table>
    
    
</div>
