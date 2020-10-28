<?php  

/**  
 * @file  
 * Contains Drupal\promotion_block\Form\PromotionSettings.
 */  

namespace Drupal\promotion_block\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class PromotionSettings extends ConfigFormBase {
   /**  
   * {@inheritdoc}  
   */  
  protected function getEditableConfigNames() {
    return [
      'promotion_block.promotion_settings',
    ];
  }  

  /**  
   * {@inheritdoc}  
   */  
  public function getFormId() {
    return 'promotion_block_settings';
  }  

  /**  
   * {@inheritdoc}  
   */  
  public function buildForm(array $form, FormStateInterface $form_state) {  

    $config = $this->config('promotion_block.promotion_settings');

    $form['pr_title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#default_value' => $config->get('pr_title'),
      '#description' => $this->t('Add title for the promotion details'),
    ];

    $form['pr_description'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description'),
      '#default_value' => $config->get('pr_description'),
      '#description' => $this->t('Add description for the promotion details'),
    ];
    return parent::buildForm($form, $form_state);

  }
  /**
   * Submit form method
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {  
    parent::submitForm($form, $form_state);

    // Get Form values
    $formValues = $form_state->getValues();
    $this->config('promotion_block.promotion_settings')
      ->set('pr_title', $formValues['pr_title'])
      ->set('pr_description', $formValues['pr_description'])
      ->save();
  }  
}