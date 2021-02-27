<?php

// Si han aceptado la política
if (isset($_REQUEST['politica-cookies'])) {
  // Calculamos la caducidad, en este caso un año
  $caducidad = time() + (60 * 60 * 24 * 365);
  // Crea una cookie con la caducidad
  setcookie('politica', 'aceptada', $caducidad);
  echo '<script type="text/javascript">
            alert("N°:' . $_REQUEST['politica-cookies'] . 'Gracias por aceptar nuestras maliciosas politicas de cookies. ");
        </script>';
}
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <link rel="icon" href="storage/img/seguro.ico">
  <title>{{ config('app.name', 'Laravel') }} | Inicio</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">

  <link href='http://fonts.googleapis.com/css?family=Hind:400,500,300,600,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{asset('main/plugins/bootstrap/css/bootstrap.css')}}">

  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link href="{{asset('main/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('main/plugins/owl.carousel/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('main/onepage2/css/layout.css')}}" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">



  @laravelPWA
</head>

<body class="page-header-fixed" onload="validacion()">

  <header class="page-header">
    <nav style="background:#fff;" class="navbar navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="toggle-icon">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </span>
          </button>
          <a class="navbar-brand" href="#intro">

            <img src=" {{ asset('storage/img/AdminLTELogo.png') }}" class="logo-default" alt="Abogados LSA" width="110" style="width: 85px" />
            <img src=" {{ asset('storage/img/AdminLTELogo.png') }}" class="logo-scroll " alt="Abogados LSA" width="110" style="width: 85px;" />
          </a>
        </div>
        <div class="collapse navbar-collapse navbar-responsive-collapse">
          <ul class="nav navbar-nav">
            <li class="page-scroll active">
              <a style="color: #344452;" href="/">Inicio</a>
            </li>

            <li class="page-scroll">
              <a style="color: #344452;" href="/#features">Ramas</a>
            </li>

            <li class="page-scroll">
              <a style="color: #344452;" href="/#pricing">Servicios</a>
            </li>
            <li class="page-scroll">
              <a style="color: #344452;" href="/#contact">Contacto</a>
            </li>
            @if (Route::has('login'))
            @auth
            <li style="padding-right:5px;margin-right: 5px">
              <a href="{{ url('/dashboard') }}" class="button button-smaller button-primary-outline" style="background-color:rgba(109,223,182,1);color: white;">Dashboard</a>
            </li>
            @else
            <li style="padding-right:5px;margin-right: 5px" id="ingresar">
              <a href="{{ route('login') }}" class="button button-smaller button-primary-outline">Ingresar</a>
            </li>
            @endauth
            @endif
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <section class="section-35 section-md-top-75 section-md-bottom-50 cookie-p">
    <div class="container" style="color: gray;">
      <h3 class="text-center">Politica de cookies</h3>
      <div class="row row-40">
        <p>
          <strong>1. Generalidades</strong>
        </p>
        <p>
          <strong>1.1. Objetivo</strong>
        </p>
        <p>
          Legal Suits Abogados M&amp;C S.A.S. domiciliada en Bogotá, con dirección
          electrónica legalsuitsabogados@gmailcom, protecciondedatos@lsa.com.co y
          teléfono (+57 3144412784) (de ahora en adelante la “Firma”) coloca de
          conocimiento de los Titulares de los Datos Personales (como dichos términos
          se definen más adelante) que sean tratados de cualquier manera por la Firma
          esta política de tratamiento de la información (la “Política”), dando
          cumplimiento con ello a la Ley 1581 de 2012, al Decreto 1377 de 2013 y a
          cualquier norma que los sustituya o modifique. El propósito principal de
          esta Política es poner en conocimiento de los Titulares de los Datos
          Personales los derechos que les asisten, los procedimientos y mecanismos
          dispuestos por la Firma para hacerlos efectivos; informar quienes son las
          personas o autorizadas dentro de la Firma de atender las consultas,
          preguntas, reclamos y quejas, y darles a conocer el alcance y la finalidad
          del Tratamiento (como dicho término se define más adelante) al cual serán
          sometidos los Datos Personales en caso de que el Titular otorgue su
          autorización expresa, previa e informada.
        </p>
        <p>
          <strong>1.2. Alcance</strong>
        </p>
        <p>
          La presente Política aplica para los todos los Titulares de los Datos
          Personales que sean tratados de cualquier manera por la Firma.
        </p>
        <p>
          <strong>1.3. Definiciones</strong>
        </p>
        <p>
          Las expresiones utilizadas en mayúsculas en esta Política tendrán el
          significado que aquí se les otorga, o el significado que la Ley o la
          jurisprudencia aplicable les den, según dicha Ley o jurisprudencia sea
          modificada de tiempo en tiempo. Cualquier diferencia que exista entre los
          términos aquí definidos y los establecidos en la Ley, se preferirán
          aquellos señalados en la Ley.
        </p>
        <p>
          <strong>a. Autorización:</strong>
          Es el consentimiento previo, expreso e informado del Titular para llevar a
          cabo el Tratamiento de sus Datos Personales.
        </p>
        <p>
          <strong>b. Base de Datos:</strong>
          Es el conjunto organizado de Datos Personales que sean objeto de
          Tratamiento, electrónico o no, cualquiera que fuere la modalidad de su
          formación, almacenamiento, organización y acceso.
        </p>
        <p>
          <strong>c. Dato Financiero:</strong>
          Es todo Dato Personal referido al nacimiento, ejecución y extinción de
          obligaciones dinerarias, independientemente de la naturaleza del contrato
          que les dé origen, cuyo Tratamiento se rige por la Ley 1266 de 2008 o las
          normas que la complementen, modifiquen o adicionen.
        </p>
        <p>
          <strong>d. Dato Personal:</strong>
          Es cualquier información, vinculada o que pueda asociarse a una o varias
          personas naturales o jurídicas determinadas o determinables.
        </p>
        <p>
          <strong>e. Dato Público</strong>
          : Es el Dato Personal calificado como tal según los mandatos de la Ley o de
          la Constitución Política y, en consecuencia, es aquel que no sea
          semiprivado, privado o sensible. Son públicos, entre otros, los datos
          relativos al estado civil de las personas, a su profesión u oficio, a su
          calidad de comerciante o de servidor público y aquellos que puedan
          obtenerse sin reserva alguna. Por su naturaleza, los datos públicos pueden
          estar contenidos, entre otros, en registros públicos, documentos públicos,
          gacetas y boletines oficiales, sentencias judiciales debidamente
          ejecutoriadas que no estén sometidas a reserva.
        </p>
        <p>
          <strong>f. Dato Sensible:</strong>
          Es el Dato Personal que afecta la intimidad del Titular o cuyo uso indebido
          puede generar su discriminación, tales como aquellos que revelen
          afiliaciones sindicales, el origen racial o étnico, la orientación
          política, las convicciones religiosas, morales o filosóficas, la
          pertenencia a sindicatos , organizaciones sociales, de derechos humanos o
          que promueva intereses de cualquier partido político o que garanticen los
          derechos y garantías de partidos políticos de oposición, así como los datos
          relativos a la salud, a la vida sexual, y los datos biométricos.
        </p>
        <p>
          <strong>g. Encargado del Tratamiento:</strong>
          Es la persona natural o jurídica, pública o privada, que por sí misma o en
          asocio con otros, realice el Tratamiento de Datos Personales por cuenta del
          Responsable del Tratamiento.
        </p>
        <p>
          <strong>h. Responsable de Tratamiento</strong>
          : Es la persona natural o jurídica, pública o privada, que por sí misma o
          en asocio con otros, decida sobre la Base de Datos y/o el Tratamiento de
          los Datos Personales.
        </p>
        <p>
          <strong>i. Titular: </strong>
          Es la persona natural cuyos Datos Personales sean objeto de Tratamiento,
          como consecuencia de la relación que tiene el Titular y la Firma.
        </p>
        <p>
          <strong>j. Transferencia:</strong>
          Tiene lugar cuando el Responsable y/o Encargado del Tratamiento de Datos
          Personales, ubicado en Colombia envía la información de los datos
          personales a un receptor, que a su vez es responsable del tratamiento y se
          encuentra dentro o fuera del país.
        </p>
        <p>
          <strong>k. Transmisión: </strong>
          Tratamiento de Datos Personales que implica la comunicación a un tercero de
          los mismos dentro o fuera del territorio de la República de Colombia,
          cuando dicha comunicación tenga por objeto la realización de un Tratamiento
          por el Encargado en nombre y por cuenta del Responsable, para cumplir con
          las finalidades de este último.
        </p>
        <p>
          <strong>l. Tratamiento:</strong>
          Es toda operación y procedimiento sistemático, electrónico o no, que
          permita la recolección, conservación, ordenamiento, almacenamiento,
          modificación, relacionamiento, uso, circulación, evaluación, bloqueo,
          destrucción y en general, el procesamiento de Datos Personales, así como
          también su Transferencia y/o Transmisión a terceros a través de
          comunicaciones, consultas, interconexiones, cesiones, mensajes de datos.
        </p>
        <p>
          <strong>2. Políticas</strong>
        </p>
        <p>
          <strong>2.1. Principios</strong>
        </p>
        <p>
          La Firma, en el desarrollo de sus actividades comerciales recolectará,
          utilizará, almacenará, transmitirá, transferirá y en general Tratará los
          Datos Personales de los Titulares, de conformidad con las finalidades
          establecidas en la presente Política. En todo Tratamiento de Datos
          Personales realizado por la Firma, los Responsables, Encargados y/o
          terceros a quienes se les transfiera Datos Personales, deberán dar
          cumplimiento a los principios y reglas establecidas en la Ley y en esta
          Política, con el fin de garantizar el derecho al habeas data de los
          Titulares y dar cumplimiento a las obligaciones de Ley y a los lineamientos
          internos de la Firma. Estos principios son:
        </p>
        <p>
          <strong>a. Autorización previa: </strong>
          Todo Tratamiento de Datos Personales se llevará cabo una vez se haya
          obtenido la Autorización previa, expresa e informada del Titular, salvo que
          la Ley establezca una excepción a esta regla. En caso de que los Datos
          Personales hayan sido obtenidos con anterioridad a la expedición del
          Decreto 1377 de 2013, la Firma buscará los medios ordinarios y alternativos
          pertinentes para convocar a los Titulares y obtener su autorización
          retroactiva, siguiendo los lineamientos establecidos en dicho Decreto y las
          normas concordantes.
        </p>
        <p>
          <strong>b. Finalidad autorizada: </strong>
          Toda actividad de Tratamiento de Datos Personales debe obedecer a las
          finalidades mencionadas en esta Política o a las mencionadas en la
          Autorización otorgada por el Titular de los Datos Personales, o en los
          documentos específicos donde se regule cada tipo o proceso de Tratamiento
          de Datos Personales. La finalidad del Tratamiento particular de un Dato
          Personal debe ser informada al Titular del Dato Personal al momento de
          obtener su Autorización. Los Datos Personales no podrán ser tratados por
          fuera de las finalidades informadas y consentidas por los Titulares de los
          Datos.
        </p>
        <p>
          <strong>c. Calidad del Dato Personal</strong>
          : El Dato Personal sometido a Tratamiento debe ser veraz, completo, exacto,
          actualizado, comprobable y comprensible. Cuando se esté en poder de Datos
          Personales parciales, incompletos, fraccionados o que induzcan a error, la
          Firma deberá abstenerse de Tratarlos, o solicitar a su titular la
          completitud o corrección de la información.
        </p>
        <p>
          <strong>d. Entrega de información al Titular:</strong>
          Cuando el Titular lo solicite, la Firma deberá entregarle la información
          acerca de la existencia de Datos Personales que le conciernan al
          solicitante. Esta entrega de información la llevará a cabo la dependencia
          de la Firma encargada de la protección de datos personales (ver punto 7 de
          la presente Política).
        </p>
        <p>
          <strong>e. Circulación restringida:</strong>
          Los Datos Personales solo pueden ser Tratados por aquel personal de la
          Firma que cuente con autorización para ello, o quienes dentro de sus
          funciones tengan a cargo la realización de tales actividades. No podrá
          entregarse Datos Personales a quienes no cuenten con Autorización o no
          hayan sido habilitados por la Firma para llevar a cabo el Tratamiento.
        </p>
        <p>
          <strong>f. Temporalidad:</strong>
          La Firma no usará la información del titular más allá del plazo razonable
          que exija la finalidad que fue informada al Titular de los Datos
          Personales.
        </p>
        <p>
          <strong>g. Acceso restringido / Seguridad:</strong>
          Salvo por los Datos Personales expresamente autorizados, la Firma no podrá
          hacer disponibles Datos Personales para su acceso a través de internet u
          otros medios masivos de comunicación, a menos que se establezcan medidas
          técnicas y de seguridad que permitan controlar el acceso y restringirlo
          solo a las personas Autorizadas.
        </p>
        <p>
          <strong>h. Confidencialidad: </strong>
          La Firma debe siempre realizar el Tratamiento disponiendo las medidas
          técnicas, humanas y administrativas que resulten necesarias para mantener
          la confidencialidad del Dato Personal y para evitar que sea éste
          adulterado, modificado, consultado, usado, accedido, eliminado, o conocido
          por personas no Autorizadas, o que el Dato Personal se pierda. Todo nuevo
          proyecto que implique el Tratamiento de Datos Personales por parte de la
          Firma, deberá hacer referencia a esta Política de Tratamiento para asegurar
          el cumplimiento de esta regla.
        </p>
        <p>
          <strong>i. Confidencialidad y Tratamiento posterior:</strong>
          Todo Dato Personal que no sea Dato Público debe tratarse por los
          Responsables como confidencial, aun cuando la relación contractual o el
          vínculo entre el Titular del Dato Personal y la Firma haya terminado. A la
          terminación de dicho vínculo, tales Datos Personales deben continuar siendo
          Tratados de conformidad con esta Política y con la Ley.
        </p>
        <p>
          <strong>j. Individualidad:</strong>
          La Firma mantendrá de manera separada las Bases de Datos en las que tiene
          la calidad de Encargado de las Bases de Datos en las que es Responsable.
        </p>
        <p>
          <strong>k. Necesidad:</strong>
          Los Datos Personales solo pueden ser Tratados durante el tiempo y en la
          medida que el propósito de su Tratamiento lo justifique.
        </p>
        <p>
          <strong>
            <br />
            <br />
            2.2. Tratamiento de Datos Personales
          </strong>
        </p>
        <p>
          Los Datos Personales son recolectados, almacenados, organizados, usados,
          circulados, transmitidos, transferidos, actualizados, rectificados,
          suprimidos, eliminados y gestionados de acuerdo a la finalidad o
          finalidades que tenga cada tipo de Tratamiento.
        </p>
        <p>
          <strong>
            2.2.1. Tratamiento de Datos Personales de niñas, niños y/o adolescentes
          </strong>
        </p>
        <p>
          La Firma Tratará los Datos Personales de un menor de 18 años, siempre que
          exista el consentimiento previo y expreso de padres o tutores legales.
        </p>
        <p>
          En estos casos, los padres o tutores legales pueden cambiar o revocar la
          Autorización tal como se describe en esta Política.
        </p>
        <p>
          Adicionalmente, el Tratamiento de los Datos Personales de niñas, niños y
          adolescentes, cumplirá con los siguientes parámetros y requisitos:
        </p>
        <p>
          a. El Tratamiento responderá y respetará el interés superior de los niños,
          niñas y adolescentes.
        </p>
        <p>
          b. En todo momento se asegurará el respeto de sus derechos fundamentales.
        </p>
        <p>
          c. El niño, niña o adolescente será escuchado, y su opinión será valorada
          teniendo en cuenta la madurez, autonomía y capacidad para entender el
          asunto.
        </p>
        <p>
          <strong>2.2.2. Tratamiento de Datos Sensibles</strong>
        </p>
        <p>
          La Firma podrá solicitar los Datos Sensibles que expresamente se
          mencionarán en cada Autorización.
        </p>
        <p>
          En todo caso, la Firma observará estrictamente las limitaciones legales al
          Tratamiento de Datos Sensibles, sometiendo a Tratamiento los Datos
          Sensibles únicamente cuando el Titular haya otorgado su Autorización, salvo
          en los casos en que la ley no requiera de dicha Autorización. Cuando la
          Firma solicite Datos Sensibles, le informará qué tipo de Datos Personales
          tienen esta categoría y no condicionará, en ningún caso, ninguna actividad
          a la entrega de Datos Sensibles.
        </p>
        <p>
          Los Datos Sensibles serán tratados con la mayor diligencia posible y con
          los estándares de seguridad más altos. El acceso limitado a los Datos
          Sensibles será un principio rector para salvaguardar la privacidad de esos
          Datos Personales y, por lo tanto, solo el personal autorizado podrá tener
          acceso a ese tipo de información.
        </p>
        <p>
          <strong>2.3. Finalidades del Tratamiento </strong>
        </p>
        <p>
          La Firma realizará el Tratamiento de los Datos Personales para las
          finalidades informadas al momento en que el Dato Personal sea recolectado y
          que sean expresamente consentidas. Así mismo, los Encargados o terceros que
          tengan acceso a los Datos Personales por virtud de Ley o contrato,
          mantendrán el Tratamiento dentro de las siguientes finalidades:
        </p>
        <p>
          a. Gestionar toda la información necesaria para el cumplimiento de las
          obligaciones tributarias y de registros comerciales, corporativos y
          contables de la Firma.
        </p>
        <p>
          b. Cumplir con los procesos internos de la Firma en materia de
          administración de proveedores y contratistas.
        </p>
        <p>
          c. Prestar sus servicios de acuerdo con las necesidades particulares de los
          clientes de la Firma, con el fin de cumplir los contratos de servicios
          celebrados, incluyendo pero sin limitarse a la verificación de afiliaciones
          y derechos de los individuos a los cuales los clientes de la Firma
          prestarán sus servicios, utilizar los Datos Personales para mercadeo y/o
          comercialización de nuevos servicios o productos.
        </p>
        <p>
          d. El control y la prevención del fraude y de lavado de activos, incluyendo
          pero sin limitarse a la consulta en listas restrictivas, y toda la
          información necesaria requerida para el SARLAFT.
        </p>
        <p>
          e. El proceso de archivo, de actualización de los sistemas, de protección y
          custodia de información y Bases de Datos de la Firma.
        </p>
        <p>
          f. Procesos al interior de la Firma, con fines de desarrollo u operativo
          y/o de administración de sistemas.
        </p>
        <p>
          g. La transmisión y transferencia de datos a terceros con los cuales se
          hayan celebrado contratos con este objeto, para fines comerciales,
          administrativos, de mercadeo y/o operativos, incluyendo pero sin limitarse
          a la expedición de carnets, certificados personalizados y certificaciones a
          terceros, de acuerdo con las disposiciones legales vigentes. En cualquier
          caso, los terceros estarán obligados en los términos de esta Política.
        </p>
        <p>
          h. Mantener y procesar por computadora u otros medios, cualquier tipo de
          información relacionada con el negocio del cliente con el fin de brindar
          los servicios y productos pertinentes.
        </p>
        <p>
          i. Las demás finalidades que determinen los Responsables en procesos de
          obtención de Datos Personales para su Tratamiento, con el fin de dar
          cumplimiento a las obligaciones legales y regulatorias, así como de las
          políticas internas de la Firma.
        </p>
        <p>
          <strong>2.4. Derechos del Titular de los Datos Personales</strong>
        </p>
        <p>
          De acuerdo con la Ley, los Titulares de Datos Personales tienen los
          siguientes derechos:
        </p>
        <p>
          <strong>a. Derecho de actualización:</strong>
          Conocer, actualizar y rectificar sus Datos Personales frente a la Firma o
          los Encargados del Tratamiento de los mismos. Este derecho se podrá ejercer
          frente a Datos Personales parciales, inexactos, incompletos, fraccionados,
          que induzcan a error, o aquellos cuyo Tratamiento esté expresamente
          prohibido o no haya sido autorizado.
        </p>
        <p>
          <strong>b. Derecho de prueba</strong>
          : Solicitar prueba de la Autorización otorgada a la Firma, salvo cuando
          expresamente se exceptúe como requisito para el Tratamiento, de conformidad
          con lo establecido en el artículo 10 de la Ley 1581 de 2012 (o en las
          normas que la reglamenten, adicionen, complementen, modifiquen o deroguen),
          o cuando se haya presentado la continuidad del Tratamiento según lo
          previsto en el numeral 4° del artículo 10 del Decreto 1377 de 2013.
        </p>
        <p>
          <strong>c. Derecho de información:</strong>
          Presentar solicitudes ante la Firma o el Encargado del Tratamiento respecto
          del uso que le ha dado a sus Datos Personales, y a que éstas le entreguen
          tal información.
        </p>
        <p>
          <strong>d. Derecho de quejas y reclamos:</strong>
          Presentar ante la Superintendencia de Industria y Comercio quejas por
          infracciones a la Ley, una vez haya agotado el trámite de consulta o
          reclamo ante la Firma de acuerdo con lo previsto en el artículo 16 de la
          Ley 1581 de 2012.
        </p>
        <p>
          <strong>e. Derecho de revocación:</strong>
          Revocar su Autorización y/o solicitar la supresión de sus Datos Personales
          de las bases de datos de la Firma, cuando la Superintendencia de Industria
          y Comercio haya determinado mediante acto administrativo definitivo que en
          el Tratamiento la Firma o el Encargado del Tratamiento ha incurrido en
          conductas contrarias a la Ley o cuando no hay una obligación legal o
          contractual de mantener el Dato Personal en la Base de Datos del
          Responsable.
        </p>
        <p>
          <strong>f. Derecho de acceso:</strong>
          Solicitar acceso y acceder en forma gratuita a sus Datos Personales que
          hayan sido objeto de Tratamiento de acuerdo con el artículo 21 del Decreto
          1377 del 2013.
        </p>
        <p>
          <strong>g. Derecho de conocimiento:</strong>
          Conocer las modificaciones a los términos de esta Política de manera previa
          y eficiente a la implementación de las nuevas modificaciones o, en su
          defecto, de la nueva política de tratamiento de la información. Así como
          conocer a la dependencia o persona facultada por la Firma frente a quien
          podrá presentar quejas, consultas, reclamos y cualquier otra solicitud
          sobre sus Datos Personales.
        </p>
        <p>
          <strong>h. Derecho de supresión:</strong>
          Solicitar la supresión de sus Datos Personales de las Bases de Datos
          siempre y cuando no exista un deber legal o una obligación de carácter
          contractual en virtud de la cual no sea posible dicha supresión.
        </p>
        <p>
          Los Titulares podrán ejercer sus derechos de Ley y realizar los
          procedimientos establecidos en esta Política, mediante la presentación de
          su documento de identificación o copia del mismo. Los menores de edad
          podrán ejercer sus derechos personalmente, o a través de sus padres o los
          adultos que detenten la patria potestad, quienes deberán demostrarlo
          mediante la documentación pertinente. Así mismo podrán ejercer los derechos
          del Titular los causahabientes que acrediten dicha calidad, el
          representante y/o apoderado del titular con la acreditación correspondiente
          y aquellos que han hecho una estipulación a favor de otro o para otro.
        </p>
        <p>
          <strong>
            2.5. Área responsable de la atención de peticiones, consultas y
            reclamos
          </strong>
        </p>
        <p>
          La Firma ha designado a la gestión de Servicio al Cliente como área a cargo
          de la recepción y atención de peticiones, quejas, reclamos y consultas de
          todo tipo relacionadas con los Datos Personales. La persona designada de
          Servicio al Cliente tramitará las consultas y reclamaciones en materia de
          Datos Personales de conformidad con la Ley y esta Política.
        </p>
        <p>
          Algunas de las funciones particulares de esta área en relación con Datos
          Personales son:
        </p>
        <p>
          a. Recibir las solicitudes de los Titulares de Datos Personales, tramitar y
          responder aquellas que tengan fundamento en la Ley o esta Política, como
          por ejemplo: solicitudes de actualización de Datos Personales; solicitudes
          para conocer los Datos Personales; solicitudes de supresión de Datos
          Personales; solicitudes de información sobre el uso dado a sus Datos
          Personales; solicitudes de actualización de los Datos Personales;
          solicitudes de prueba de la Autorización otorgada, cuando ella hubiere
          procedido según la Ley, entre otras.
        </p>
        <p>
          b. Dar respuesta a los Titulares de los Datos Personales sobre aquellas
          solicitudes que no procedan de acuerdo con la Ley.
        </p>
        <p>
          c. Los datos de contacto del Servicio al Cliente son:
        </p>
        <p>
          <br />
          Dirección electrónica: protecciondedatos@lsa.com.co
          <br />
          Teléfono: (+57-3144412784)
          <br />
          Cargo de la persona de contacto: Analista de Servicio al Cliente
          <br />
        </p>
        <p>
          <strong>
            <br />
            2.6. Procedimientos para ejercer los derechos de los Titulares de los
            Datos Personales
          </strong>
        </p>
        <p>
          <strong>2.6.1. Consultas</strong>
        </p>
        <p>
          La Firma dispondrá de mecanismos para que el Titular, sus causahabientes,
          sus representantes y/o apoderados, aquellos a quienes se ha estipulado a
          favor de otro o para otro, y/o los representantes de menores de edad
          Titulares, formulen consultas respecto de cuáles son los Datos Personales
          del Titular que reposan en las Bases de Datos de la Firma.
        </p>
        <p>
          Estos mecanismos podrán ser electrónicos a través del correo de Servicio al
          Cliente protecciondedatos@lsa.com.co o telefónicamente en la línea de
          atención (+57-3144412784), encargados de recibir las peticiones, quejas y
          reclamos en los teléfonos.
        </p>
        <p>
          Cualquiera que sea el medio, la Firma guardará prueba de la consulta y su
          respuesta. En consecuencia, los siguientes son los pasos a seguir para la
          presentación de consultas:
        </p>
        <p>
          a. Las solicitudes se deberán formular por escrito.
        </p>
        <p>
          b. La solicitud será analizada para verificar la identificación del
          Titular. Si la solicitud es formulada por persona distinta del Titular y no
          se acredite que la misma actúa en representación de aquél de conformidad
          con las leyes vigentes, la solicitud será rechazada. Para ello puede
          solicitar el documento de identificación del Titular o copia del mismo, y
          los poderes especiales, generales o documentos que se exijan según sea el
          caso.
        </p>
        <p>
          c. Si el solicitante tuviere capacidad para formular la consulta, de
          conformidad con los criterios de acreditación establecidos en la Ley 1581
          de 2012 y el Decreto 1377 de 2013, la Firma recopilará toda la información
          sobre el Titular que esté contenida en el registro individual de esa
          persona o que esté vinculada con la identificación del Titular dentro de
          las Bases de Datos de la Firma.
        </p>
        <p>
          d. La persona asignada para atender la consulta dará respuesta dentro de
          los diez (10) días hábiles contados a partir de la fecha en la que la
          solicitud fue recibida por la Firma.
        </p>
        <p>
          e. En todo caso, la respuesta definitiva a todas las solicitudes no tardará
          más de quince (15) días hábiles desde la fecha en la que la solicitud
          inicial fue recibida por la Firma.
        </p>
        <p>
          <strong>2.6.2. Reclamos</strong>
        </p>
        <p>
          La Firma dispone de mecanismos para que el Titular, sus causahabientes,
          representante y/o apoderados, aquellos que estipularon por otro o para
          otro, y/o los representantes de menores de edad Titulares, formulen
          reclamos respecto de: (i) Datos Personales Tratados por la Firma que deben
          ser objeto de corrección, actualización, supresión o revocatoria de la
          Autorización o (ii) el presunto incumplimiento de los deberes de Ley de la
          Firma.
        </p>
        <p>
          Estos mecanismos podrán electrónicos a través del correo de Servicio al
          Cliente para los asuntos relacionados con esta Política
          protecciondedatos@lsa.com.co o telefónicamente en la línea de atención
          (+57-) 3144412784, encargados de recibir las peticiones, quejas y reclamos
          en los teléfonos.
        </p>
        <p>
          Cualquiera que sea el medio, la Firma guardará prueba del reclamo y su
          respuesta. En consecuencia, los siguientes son los pasos a seguir para la
          presentación de reclamos:
        </p>
        <p>
          a. El reclamo se formulará mediante solicitud escrita.
        </p>
        <p>
          b. La solicitud será analizada para verificar la identificación del
          Titular. Si la solicitud es formulada por persona distinta del Titular y no
          se acredite que la misma actúa en representación de aquél de conformidad
          con las leyes vigentes, la solicitud será rechazada. Para ello puede
          solicitar la cédula de ciudadanía o documento de identificación original
          del Titular, y los poderes especiales, generales o documentos que se exijan
          según sea el caso.
        </p>
        <p>
          c. El reclamo debe contener la siguiente información: (i) Nombre y número
          de documento de identificación del Titular. (ii) Los datos de contacto
          (dirección física y/o electrónica y teléfonos de contacto). (iii) Los
          documentos que acrediten la identidad del Titular, o la representación de
          su representante. (iv) La descripción clara y precisa de los Datos
          Personales respecto de los cuales el Titular busca ejercer alguno de los
          derechos. (v) La descripción de los hechos que dan lugar al reclamo y el
          objetivo perseguido (actualización, corrección, revocatoria, supresión, o
          cumplimiento de deberes). (vi) Los documentos que se quiera hacer valer.
          (vii) Firma, correo electrónico, nombre y número de identificación del
          solicitante del reclamo.
        </p>
        <p>
          d. Si el reclamo o la documentación adicional están incompletos, la Firma
          requerirá al reclamante por una sola vez dentro de los cinco (5) días
          siguientes a la recepción del reclamo para que subsane las fallas. Si el
          reclamante no presenta la documentación e información requerida dentro de
          los dos (2) meses siguientes a la fecha del reclamo inicial, sin que el
          solicitante presente la información requerida, se entenderá que ha
          desistido del reclamo.
        </p>
        <p>
          e. Si por cualquier hecho la persona que recibe el reclamo al interior de
          la Firma no es competente para resolverlo, dará traslado al Analista de
          Servicio al Cliente dentro de los dos (2) días hábiles siguientes a haber
          recibido el reclamo, e informará de dicha remisión al reclamante.
        </p>
        <p>
          f. Una vez recibido el reclamo con la documentación completa, se incluirá
          en la Base de Datos de la Firma donde reposen los Datos del Titular sujetos
          a reclamo una leyenda que diga “reclamo en trámite” y el motivo del mismo,
          en un término no mayor a dos (2) días hábiles. Esta leyenda deberá
          mantenerse hasta que el reclamo sea decidido.
        </p>
        <p>
          g. El término máximo para atender el reclamo será de quince (15) días
          hábiles contados a partir del día hábil siguiente a la fecha de su recibo.
          Cuando no fuere posible atender el reclamo dentro de dicho término, se
          informará al interesado los motivos de la demora y la fecha en que se
          atenderá su reclamo, la cual en ningún caso podrá superar los ocho (8) días
          hábiles siguientes al vencimiento del primer término.
        </p>
        <p>
          <strong>2.6.3. Revocatoria</strong>
        </p>
        <p>
          El Titular puede revocar la Autorización para el Tratamiento de sus Datos
          Personales en cualquier momento, siempre y cuando no lo impida una
          disposición legal o exista una obligación legal o contractual.
        </p>
        <p>
          <strong>2.7. Seguridad de la Información </strong>
        </p>
        <p>
          En desarrollo del principio de seguridad, la Firma ha adoptado medidas
          técnicas, administrativas y humanas razonables para proteger los Datos
          Personales de los Titulares e impedir adulteración, pérdida, consulta, uso
          o acceso no autorizado o fraudulento. El acceso a los datos personales está
          restringido a sus Titulares y a las personas autorizadas por la Firma de
          acuerdo con esta Política. La Firma no permitirá el acceso a esta
          información por parte de terceros en condiciones diferentes a las
          anunciadas, a excepción de un pedido expreso del Titular o de las personas
          legitimadas de conformidad con la normatividad nacional.
        </p>
        <p>
          Es importante tener en cuenta que internet es una red global de
          comunicación que implica la transmisión de información en una red mundial.
          En este sentido, pese a que la Firma cuenta con medidas necesarias para la
          protección de los Datos Personales, es posible que los mismos se vean
          afectados por las fallas propias de internet.
        </p>
        <p>
          <strong>2.8. Vigencia</strong>
        </p>
        <p>
          Esta Política rige a partir del 3 de julio de 2020. Los Datos Personales
          que sean almacenados, utilizados o transmitidos permanecerán en nuestra
          Base de Datos, con base en el criterio de temporalidad y necesidad, durante
          el tiempo que sea necesario para las finalidades mencionadas en esta
          Política y la respectiva Autorización, para las cuales fueron recolectados.
          <br />
        </p>
        <p>
          <strong>
            <br />
            2.9. Modificaciones
          </strong>
        </p>
        <p>
          Esta Política podrá ser modificada por la Firma cuando así lo requiera sin
          previa notificación, siempre que se trate de modificaciones no
          sustanciales. De lo contrario, serán comunicadas previamente a los
          Titulares.
        </p>
        <p>
          <strong>
            <br />
            2.10. Anexos
          </strong>
        </p>
        <p>
          Procedimiento para la presentación de una solicitud, queja o reclamo.
        </p>
        <p>
          <strong>3. Referencias</strong>
        </p>
        <p>
          a. Artículo 15 de la Constitución Política de Colombia. Derecho a su
          intimidad personal y familiar y a su buen nombre.
        </p>
        <p>
          b. Circular Única de la Superintendencia de Industria y Comercio.
        </p>
        <p>
          c. Ley 1581 de 2012. Por la cual se dictan disposiciones generales para la
          protección de datos personales.
        </p>
        <p>
          d. Decreto 1377 de 2013. Por el cual se reglamenta parcialmente la Ley 1581
          de 2012.
        </p>
        <p>
          e. Circular 886 de 2014. Por la cual se reglamente el artículo 25 de la Ley
          1581 de 2012, relativo al Registro Nacional de Bases de Datos.
        </p>
        <p>
          f. Circular Externa 02 de 2015. Por la cual la Superintendencia de
          Industria y Comercio impartió instrucciones a los responsables del
          tratamiento de datos personales, personas jurídicas de naturaleza privada
          inscritas en las cámaras de comercio y sociedades de economía mixta, para
          efectos de realizar la inscripción de sus bases de datos en el registro
          nacional de bases de datos a partir del 9 de noviembre de 2015.
        </p>
        <p>
          g. Decreto 1074 de 2015. Por medio del cual se expide el Decreto Único
          Reglamentario del Sector Comercio, Industria y Turismo.
        </p>


      </div>
    </div>
  </section>
  <div class="footer-copyright">
    <div class="container">
      <h3>LSA A bogados</h3>
      <ul class="copyright-socials">
        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
        <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
      </ul>
      <p>Copyright © 2020-2021 <a href="http://jtwo.tk" target="_blank">jtwo.tk</a>. All rights reserved.</p>
    </div>
  </div>
  </section>

  </div>
  <div class="snackbars" id="form-output-global"></div>
  <audio id="myAudio">
    <source src="storage/img/pop.ogg" type="audio/ogg">
    <source src="storage/img/pop.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
  </audio>

  <div class="whatsapp-icon">
    <a href="https://api.whatsapp.com/send?phone=573144412784&text=¡Hola !" target="_blank"><i class="fab fa-whatsapp"></i></a>
  </div>
  <div id="chatc">

    <div id="main">
      @hasanyrole('Admin|Trabajador|AdminConjunto')

      @else

      @role('Cliente')
      <chatwidget />
      @else
      @endrole
      <chatguest />
    </div>
    @endhasanyrole
  </div>


  <style type="text/css">
    .bg-g {
      background-color: #28a745 !important;
    }

    .bg-r {
      background-color: #dc3545 !important;

    }

    .cook {
      position: fixed;
      z-index: 10;
      color: white;
      background-color: black;
      width: 100%;
      height: 85px;
      bottom: 0px;
    }

    .cookies {
      display: flex;
      position: absolute;
      top: 25px;
    }

    .caja-botones {
      margin-left: 50px;
    }

    .coo-title {
      margin-left: 25px;
      color: white;
    }

    .pregunta {
      height: 30px;
      margin-left: 50px;
      margin-top: 10px;
      font-size: 16px;
    }

    @media (max-width: 575px) {
      .cook {
        position: fixed;
        z-index: 10;
        color: white;
        background-color: black;
        width: 100%;
        height: 134px;
        bottom: 0px;
      }

      .cookies {
        display: grid;
        grid-template-columns: repeat(3);
        width: 100%;
        position: absolute;
        top: 0px;
      }

      .coo-title {
        grid-column: 0 / 2;
        grid-row: 1;
        text-align: center;
        margin-top: 2%;
      }

      .pregunta {
        grid-row: 2;
        grid-column: 1 / 3;
        text-align: center;
        margin-left: 0px;
        margin-top: 2%;
      }

      .caja-botones {
        margin-left: 6%;
        margin-top: 2%;
        text-align: center;

      }
    }
  </style>
  <?php if (!isset($_COOKIE['politica'])) : ?>
    <!-- Mensaje de cookies -->
    <div class="cook" id="cookie">

      <div class="cookies">
        <!-- Titulo -->
        <div>
          <h4 class="coo-title">Politica de Cookies</h4>
        </div>
        <!-- Descripción con enlace -->
        <div>
          <p class="pregunta">
            <span> ¿Aceptas nuestras </span>
            <a style="color: rgb(0, 158, 207);" href="/politica">Política de Cookies</a>?
          </p>
        </div>



        <div class="caja-botones">


          <!-- Botón para aceptar -->
          <button type="button" class="btn bg-success bg-g" style="margin-right: 20px;color: white" onclick="aceptar()">
            Aceptar
          </button>

          <!-- Botón para NO aceptar -->
          <button type="button" class="btn bg-danger bg-r" style="margin:auto;margin-right: 15px;color: white;text-align: center;" onclick="rechazar()">

            No, gracias.
          </button>
        </div>

      </div>

    <?php endif; ?>

    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('main/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('main/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('main/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('main/plugins/jquery.easing.js')}}" type="text/javascript"></script>
    <script src="{{asset('main/plugins/jquery.parallax.js')}}" type="text/javascript"></script>
    <script src="{{asset('main/plugins/smooth-scroll/smooth-scroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('main/plugins/owl.carousel/owl.carousel.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('main/onepage2/scripts/layout.js')}}" type="text/javascript"></script>
    <script src="{{asset('main/pages/scripts/bs-carousel.js')}}" type="text/javascript"></script>
    <script>
      jQuery(document).ready(function() {
        Layout.init();
      });
    </script>
    <script type="text/javascript">
      function rechazar() {

        var x = document.getElementById("cookie");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }

      }

      function aceptar() {
        document.cookie = "politica=aceptada"
        var x = document.getElementById("cookie");

        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
        var y = document.getElementById("ingresar");
        var z = document.getElementById("chatc");
        y.style.display = "block";
        z.style.display = "block";
      }

      function validacion() {
        var politica = document.cookie.replace(/(?:(?:^|.*;\s*)politica\s*\=\s*([^;]*).*$)|^.*$/, "$1");

        var x = document.getElementById("chatc");
        var y = document.getElementById("ingresar");
        if (politica) {} else {
          x.style.display = "none";
          y.style.display = "none";
        }
      }
    </script>
    <script src="{{asset('js/form-contact.js')}}"></script>


</body>



</html>