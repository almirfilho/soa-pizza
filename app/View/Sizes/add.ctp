<?php

print $this->Form->create( 'Size', array( 'class' => 'form-horizontal' ) );
print $this->BForm->input( 'Size.title', array( 'label' => 'Nome', 'placeholder' => 'Nome do tamanho' ) );
print $this->BForm->input( 'Size.factor', array( 'label' => 'Fator de preço', 'class' => 'span1', 'placeholder' => '0.0', 'step' => '0.1', 'help' => 'referente ao tamanho Médio.' ) );
print $this->element( "submit", array( 'cancel' => '/sizes' ) );

?>