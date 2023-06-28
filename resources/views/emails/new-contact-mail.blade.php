<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

<strong>Ciao ristoratore,</strong>
<br />

hai ricevuto un nuovo ordine. Questi sono i dettagli:
<br /><br />
Nome: <em>{{ $lead->customer_name }}</em>

<br /><br />
Email: <em>{{ $lead->customer_email }}</em> <br>
Tel: <em>{{ $lead->customer_phone_number }}</em><br>
Indirizzo: <em>{{ $lead->customer_address }}</em>
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
