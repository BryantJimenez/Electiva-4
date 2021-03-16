<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ticket {{ $venta->codigo }}</title>
</head>
<body>
	<table style="font-size:13px; text-align:center">
		<tr>
			<td style="width:260px;">
				<div>
					Fecha: {{ $venta->created_at->format('d-m-Y') }}

					<br><br>
					Inventory System
					
					<br>
					NIT: 71.759.963-9

					<br>
					Dirección: Calle 44B 92-11

					<br>
					Teléfono: 300 786 52 49

					<br>
					FACTURA N.{{ $venta->codigo }}
					<br><br>					
					Cliente: {{ $venta->cliente->name }}
					<br>
					Vendedor: {{ $venta->vendedor->name }}
					<br>
				</div>
			</td>
		</tr>
	</table>
	<br>
	<table style="font-size:13px;">
		@foreach($venta->productos as $p)
			<tr>
				<td style="width:260px; text-align: center;">
				{{ $p->producto->name }}<br> $ {{ $p->precio_unitario / $p->cantidad }} Und * {{ $p->cantidad }}  = $ {{ $p->precio_unitario }}<br>
				</td>
			</tr>
			{{-- <tr>
				<td style="width:160px; text-align:right">
				$ {{ $p->precio_unitario }} Und * {{ $p->cantidad }}  = $ {{ $p->precio_unitario }}
				<br>
				</td>
			</tr> --}}
		@endforeach
	</table>
	<br>
	<table style="font-size:13px; text-align:right">

	<tr>
	
		<td style="width:80px;">
			 NETO: 
		</td>

		<td style="width:80px;">
			$ {{ number_format($venta->neto, 2) }}
		</td>

	</tr>

	<tr>
	
		<td style="width:80px;">
			 IMPUESTO: 
		</td>

		<td style="width:80px;">
			$ {{ number_format($venta->impuestos, 2) }}
		</td>

	</tr>

	<tr>
	
		<td style="width:160px;">
			 --------------------------
		</td>

	</tr>

	<tr>
	
		<td style="width:80px;">
			 TOTAL: 
		</td>

		<td style="width:80px;">
			$ {{ number_format($venta->total, 2) }}
		</td>

	</tr>

	<tr>
	
		<td style="width:210px;  text-align: center;">
			<br>
			<br>
			Muchas gracias por su compra
		</td>

	</tr>

</table>
</body>
</html>