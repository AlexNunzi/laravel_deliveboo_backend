<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

<div>Ciao <strong>{{ $lead->customer_name }}</strong>,</div>

<br />

<div>
    grazie per aver ordinato da noi, saremo da te al più presto. Ecco il riepilogo del tuo ordine:
</div>
<br /><br />

<table>
    <tr style="text-align: left">
        <th>Nome del piatto</th>
        <th>Quantità</th>
        <th>Prezzo</th>
    </tr>
    @foreach ($foods as $food)
        <tr>
            <td>{{ $food['name'] }}</td>
            <td style="text-align: center">{{ $food['quantity'] }} </td>
            <td style="text-align: center">{{ $food['price'] * $food['quantity'] }}</td>
        </tr>
    @endforeach

    <tr>
        <th style="text-align: left">Totale</th>
        <td></td>
        <td style="text-align: center">{{ $lead->total_price }}€</td>
    </tr>
</table>
<br>
<div>
    Da consegnare presso: <strong>{{ $lead->customer_address }}</strong>.
</div>
