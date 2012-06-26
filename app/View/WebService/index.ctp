<?= "<?xml version='1.0' encoding='UTF-8' ?>" ?>
<definitions name='Pizza'
targetNamespace='urn:SOAPizza'
xmlns:tns='urn:SOAPizza'
xmlns:soap='http://schemas.xmlsoap.org/wsdl/soap/'
xmlns:xs="http://www.w3.org/2001/XMLSchema"
xmlns:xsd='http://www.w3.org/2001/XMLSchema'
xmlns:soapenc='http://schemas.xmlsoap.org/soap/encoding/'
xmlns:wsdl='http://schemas.xmlsoap.org/wsdl/'
xmlns='http://schemas.xmlsoap.org/wsdl/'>

<types>
	<xs:schema elementFormDefault="qualified" targetNamespace="urn:SOAPizza">
		<!-- Price -->
		<xs:complexType name="Price">
			<xs:sequence>
				<xs:element name="PizzaSize" type="tns:PizzaSize"/>
				<xs:element name="value" type="xs:float"/>
			</xs:sequence>
		</xs:complexType>

		<!-- Pizza Size -->
		<xs:complexType name="PizzaSize">
			<xs:sequence>
				<xs:element name="id" type="xs:integer"/>
				<xs:element name="title" type="xs:string"/>
			</xs:sequence>
		</xs:complexType>
		<xs:complexType name="ArrayOfPizzaSize">
			<xs:sequence>
				<xs:element name="PizzaSize" type="tns:PizzaSize" minOccurs="0" maxOccurs="unbounded" nillable="true"/>
			</xs:sequence>
		</xs:complexType>

		<!-- Pizza Border -->
		<xs:complexType name="PizzaBorder">
			<xs:sequence>
				<xs:element name="id" type="xs:integer"/>
				<xs:element name="title" type="xs:string"/>
				<xs:sequence>
					<xs:element name="Price" type="tns:Price" minOccurs="0" maxOccurs="unbounded" nillable="true"/>
				</xs:sequence>
			</xs:sequence>
		</xs:complexType>
		<xs:complexType name="ArrayOfPizzaBorder">
			<xs:sequence>
				<xs:element name="PizzaBorder" type="tns:PizzaBorder" minOccurs="0" maxOccurs="unbounded" nillable="true"/>
			</xs:sequence>
		</xs:complexType>

		<!-- Pizza Flavor -->
		<xs:complexType name="PizzaFlavor">
			<xs:sequence>
				<xs:element name="id" type="xs:integer"/>
				<xs:element name="title" type="xs:string"/>
				<xs:element name="ingredients" type="xs:string"/>
				<xs:sequence>
					<xs:element name="Price" type="tns:Price" minOccurs="0" maxOccurs="unbounded" nillable="true"/>
				</xs:sequence>
			</xs:sequence>
		</xs:complexType>
		<xs:complexType name="ArrayOfPizzaFlavor">
			<xs:sequence>
				<xs:element name="PizzaFlavor" type="tns:PizzaFlavor" minOccurs="0" maxOccurs="unbounded" nillable="true"/>
			</xs:sequence>
		</xs:complexType>

		<!-- PizzaItem -->
		<xs:complexType name="PizzaItem">
			<xs:sequence>
				<xs:element name="flavorId" type="xs:integer"/>
				<xs:element name="sizeId" type="xs:integer"/>
				<xs:element name="borderId" type="xs:integer"/>
			</xs:sequence>
		</xs:complexType>

		<!-- Delivery -->
		<xs:complexType name="Delivery">
			<xs:sequence>
				<xs:element name="name" type="xs:string"/>
				<xs:element name="address" type="xs:string"/>
				<xs:element name="phone" type="xs:string"/>
			</xs:sequence>
		</xs:complexType>

		<!-- PizzaOrder -->
		<xs:complexType name="PizzaOrder">
			<xs:sequence>
				<xs:element name="Delivery" type="tns:Delivery"/>
				<xs:sequence>
					<xs:element name="PizzaItem" type="tns:PizzaItem" minOccurs="1" maxOccurs="unbounded"/>
				</xs:sequence>
			</xs:sequence>
		</xs:complexType>

	</xs:schema>
</types>

<!-- getSizes -->
<message name='getSizesSoapRequest'>
	<part name='upc' type='xsd:string'/>
</message>
<message name='getSizesSoapResponse'>
	<part name='Result' type='tns:ArrayOfPizzaSize'/>
</message>

<!-- getBorders -->
<message name='getBordersSoapRequest'>
	<part name='upc' type='xsd:string'/>
</message>
<message name='getBordersSoapResponse'>
	<part name='Result' type='tns:ArrayOfPizzaBorder'/>
</message>

<!-- getFlavors -->
<message name='getFlavorsSoapRequest'>
	<part name='upc' type='xsd:string'/>
</message>
<message name='getFlavorsSoapResponse'>
	<part name='Result' type='tns:ArrayOfPizzaFlavor'/>
</message>

<!-- orderPizza -->
<message name='orderPizzaSoapRequest'>
	<part name='upc' type='tns:PizzaOrder'/>
</message>
<message name='orderPizzaSoapResponse'>
	<part name='Result' type='xsd:string'/>
</message>

<portType name='PizzaPortType'>
	<operation name='getSizes'>
		<input message='tns:getSizesSoapRequest'/>
		<output message='tns:getSizesSoapResponse'/>
	</operation>
	
	<operation name='getBorders'>
		<input message='tns:getBordersSoapRequest'/>
		<output message='tns:getBordersSoapResponse'/>
	</operation>
	
	<operation name='getFlavors'>
		<input message='tns:getFlavorsSoapRequest'/>
		<output message='tns:getFlavorsSoapResponse'/>
	</operation>

	<operation name='orderPizza'>
		<input message='tns:orderPizzaSoapRequest'/>
		<output message='tns:orderPizzaSoapResponse'/>
	</operation>
</portType>

<binding name='PizzaBinding' type='tns:PizzaPortType'>
	<soap:binding style='rpc' transport='http://schemas.xmlsoap.org/soap/http'/>

	<operation name='getSizes'>
		<soap:operation soapAction='urn:xmethods-delayed-quotes#getSizes'/>
		<input>
			<soap:body use='encoded' namespace='urn:xmethods-delayed-quotes' encodingStyle='http://schemas.xmlsoap.org/soap/encoding/'/>
		</input>
		<output>
			<soap:body use='encoded' namespace='urn:xmethods-delayed-quotes' encodingStyle='http://schemas.xmlsoap.org/soap/encoding/'/>
		</output>
	</operation>

	<operation name='getBorders'>
		<soap:operation soapAction='urn:xmethods-delayed-quotes#getBorders'/>
		<input>
			<soap:body use='encoded' namespace='urn:xmethods-delayed-quotes' encodingStyle='http://schemas.xmlsoap.org/soap/encoding/'/>
		</input>
		<output>
			<soap:body use='encoded' namespace='urn:xmethods-delayed-quotes' encodingStyle='http://schemas.xmlsoap.org/soap/encoding/'/>
		</output>
	</operation>

	<operation name='getFlavors'>
		<soap:operation soapAction='urn:xmethods-delayed-quotes#getFlavors'/>
		<input>
			<soap:body use='encoded' namespace='urn:xmethods-delayed-quotes' encodingStyle='http://schemas.xmlsoap.org/soap/encoding/'/>
		</input>
		<output>
			<soap:body use='encoded' namespace='urn:xmethods-delayed-quotes' encodingStyle='http://schemas.xmlsoap.org/soap/encoding/'/>
		</output>
	</operation>

	<operation name='orderPizza'>
		<soap:operation soapAction='urn:xmethods-delayed-quotes#orderPizza'/>
		<input>
			<soap:body use='encoded' namespace='urn:xmethods-delayed-quotes' encodingStyle='http://schemas.xmlsoap.org/soap/encoding/'/>
		</input>
		<output>
			<soap:body use='encoded' namespace='urn:xmethods-delayed-quotes' encodingStyle='http://schemas.xmlsoap.org/soap/encoding/'/>
		</output>
	</operation>
</binding>

<service name='PizzaService'>
  <port name='PizzaPort' binding='PizzaBinding'>
    <soap:address location='<?= Configure::read( "soapServerUrl" ) ?>'/>
  </port>
</service>

</definitions>