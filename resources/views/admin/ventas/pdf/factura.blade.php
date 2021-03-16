<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Factura {{ $venta->codigo }}</title>
  </head>
  <style>
    .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 26cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;

}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 12px;
  text-align: center;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
  </style>
  <body>
    <header class="clearfix">
      <h1>FACTURA N.{{ $venta->codigo }}</h1>
      {{-- <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div> --}}
      <div id="project">
        <div><span>NIT: </span> 71.759.963-9</div><br>
        <div><span>DIRECCIÓN</span> Calle 44B 92-11</div><br>
        <div><span>TELÉFONO</span> 300 786 52 49</div>
        <hr>
        <div><span>CLIENTE</span> {{ $venta->cliente->name }}</div>
        <div><span>VENDEDOR</span> {{ $venta->vendedor->name }}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">PRODUCTO</th>
            <th class="desc">CANTIDAD</th>
            <th>VALOR UNIT</th>
            <th>VALOR TOTAL</th>
          </tr>
        </thead>
        <tbody>
          @foreach($venta->productos as $p)
            <tr>
              <td class="service">{{ $p->producto->name }}</td>
              <td class="desc">{{ $p->cantidad,2 }}</td>
              <td class="unit">${{ number_format($p->precio_unitario / $p->cantidad,2) }}</td>
              <td class="qty">${{ number_format($p->precio_unitario,2) }}</td>
            </tr>
          @endforeach
          <tr>
            <td colspan="3">NETO</td>
            <td class="total">${{ number_format($venta->neto,2) }}</td>
          </tr>
          <tr>
            <td colspan="3">IMPUESTO</td>
            <td class="total">${{ number_format($venta->impuestos,2) }}</td>
          </tr>
          <tr>
            <td colspan="3" class="grand total">TOTAL</td>
            <td class="grand total">${{ number_format($venta->total,2) }}</td>
          </tr>
        </tbody>
      </table>
      {{-- <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div> --}}
    </main>
    <footer>
      Gracias por tu compra.
    </footer>
  </body>
</html>