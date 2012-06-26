<?php

print $this->Form->create( 'Flavor', array( 'class' => 'form-horizontal' ) );
print $this->BForm->input( 'Flavor.title', array( 'label' => 'Nome', 'placeholder' => 'Nome do sabor' ) );
print $this->BForm->input( 'Flavor.price', array( 'label' => 'Preço', 'class' => 'span1', 'placeholder' => '0,00', 'step' => '0.25', 'prepend' => 'R$', 'help' => 'referente ao tamanho Médio.' ) );
print $this->BForm->input( 'Flavor.ingredients', array( 'label' => 'Ingredientes', 'class' => 'span6', 'placeholder' => 'Lista de ingredientes...' ) );
print $this->element( "submit", array( 'cancel' => '/flavors' ) );

?>