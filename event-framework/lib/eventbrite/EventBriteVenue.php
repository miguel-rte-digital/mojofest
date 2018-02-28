<?php
/**
 * EventBriteConnector.
 * Version: 1.0
 * Author: bmeme
 */

/**
 * Class EventBriteEvent
 */
class EventBriteVenue extends EventBriteEntity{

  /**
   * @return string
   */
  public function getEntityAPIType() {
    return 'venues';
  }
}