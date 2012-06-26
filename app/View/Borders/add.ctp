<?php

print $this->Form->create( 'Border', array( 'class' => 'form-horizontal' ) );
print $this->BForm->input( 'Border.title', array( 'label' => 'Nome', 'placeholder' => 'Nome da borda' ) );
print $this->BForm->input( 'Border.price', array( 'label' => 'Preço', 'class' => 'span1', 'placeholder' => '0,00', 'step' => '0.25', 'prepend' => 'R$', 'help' => 'referente ao tamanho Médio.' ) );
print $this->element( "submit", array( 'cancel' => '/borders' ) );

?>