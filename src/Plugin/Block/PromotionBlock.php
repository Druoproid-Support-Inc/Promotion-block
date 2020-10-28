<?php

namespace Drupal\promotion_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides map block for site.
 *
 * @Block(
 *   id = "promotion_modal_block",
 *   admin_label = @Translation("Promotion Modal Block"),
 *   category = @Translation("Custom Blocks")
 * )
 */
class PromotionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $config = \Drupal::config('promotion_block.promotion_settings');

    // Set the promotion details
    $promotionArray['title'] = $config->get('pr_title');
    $promotionArray['description'] = $config->get('pr_description');

    return [
      '#theme' => 'promotion_modal_block',
      '#promotion_details' => $promotionArray,
      '#attached' => [
          'library' => [
            'promotion_block/promotion_modal_assests'],
          ],
      ];
  }
}
