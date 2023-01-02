<?php

namespace Drupal\custom_blast\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class BlastAPI extends FormBase{

    const BLAST_API_CONFIG_PAGE = 'blast_api_config_page:values';

    public function getFormId()
    {
        return 'blast_api_config_page';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $values = \Drupal::state()->get(self::BLAST_API_CONFIG_PAGE);
        
        $form = [];

        $form['api_base_url'] = [
            '#type' => 'textfield',
            '#title' => 'API base URL',
            '#description' => 'This is the API base URL',
            '#required' => TRUE,
            '#default_value' => isset($values['api_base_url'])?$values['api_base_url']:'',
        ];

        $form['api_key'] = [
            '#type' => 'textfield',
            '#title' => 'API key',
            '#description' => 'This is the API key',
            '#required' => TRUE,
            '#default_value' => isset($values['api_key'])?$values['api_base_url']:'',
        ];

        $form['actions']['#type'] = 'actions';
        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => 'Save',
            '#button_type' => 'primary',

        ];

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $submitted_values = $form_state->cleanValues()->getValues();
        \Drupal::state()->set(self::BLAST_API_CONFIG_PAGE, $submitted_values);

        $messenger = \Drupal::service('messenger');
        $messenger->addMessage('API configuration saved.');
    }

}
