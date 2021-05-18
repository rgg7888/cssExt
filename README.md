# cssExt

<h2>Extension Css para html - armor</h2>

<h3>Helpers</h3>

<ul>
    <li>css (array $selectores_propiedades)</li>
    <li>style($content = null,array $atributos = [])</li>
    <li>sye(array $propiedades,string $selector = "",int $serie = 0,$jump = false)</li>
</ul>

<p>
    por el momento la funcion sye se utiliza para crear
    propiedades, selectores e importar fonts.
</p>

<p>
    tambien cuenta con unas habilidades especiales
    que te permiten crear serie de selectores y
    patrones de los mismos.
</p>

<p>
puede utilizar style() pero se recomienda utilizar css()
para agregar el estilo css en la etiqueta head directamente
o bien puede utilizar la funcion lnk() implementada en el paquete html-tags
para agregar archivos css externos.
</p>

<h2>Ejemplos de uso</h2>
<h3>Para importar una fuente</h3>
<pre>
css([
    sye([
        'import' => "https://fonts.googleapis.com/css2?family=Lato&display=swap"
    ])
]);
</pre>

<h3>Para importar una fuente y agregar nuestro primer selector</h3>
<pre>
css([
    sye([
        'import' => "https://fonts.googleapis.com/css2?family=Lato&display=swap"
    ]),
    sye([
        'display' => 'grid',
        'grid-template-columns' => 'repeat(3, 1fr)',
        'grid-gap' => '5px',
        'font-family' => '"Lato", sans-serif',
        'width' => '550px'
    ],".wrapper")
]);
</pre>

<h2>Serie de selectores con el mismo estilo</h2>

<p>
por ejemplo quiere crear algo asi <br>
.class, .class1, class2 { propertie1,properti2,propertie3}<br><br>
Entonces utilize la funcion sye asi:
</p>

<pre>
sye([
    'width' => '60px',
    'height' => '60px',
    'text-align' => 'center',
    'padding-top' => '10px',
    'box-sizing' => 'border-box'
],".element",10)
</pre>

<h2>Serie de selectores con la misma propiedad pero diferente valor</h2>

<p>
por ejemplo quiere crear algo asi <br>
.class1{ propertie:value1} <br>
.class2{ propertie:value2}  <br>
.class3{ propertie:value3}<br><br>
Entonces utilize la funcion sye asi:
</p>

<pre>
sye([
    'background',
    'papayawhip',
    'papayawhip',
    'papayawhip',
    'pink',
    'pink',
    'pink',
    'lightcyan',
    'lightcyan',
    'lightcyan'
],".element",10,true)
</pre>