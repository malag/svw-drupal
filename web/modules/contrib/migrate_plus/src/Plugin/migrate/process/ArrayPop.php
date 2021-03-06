<?php

declare(strict_types = 1);

namespace Drupal\migrate_plus\Plugin\migrate\process;

use Drupal\migrate\MigrateException;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Performs an array_pop() on a source array.
 *
 * @MigrateProcessPlugin(
 *   id = "array_pop",
 *   handle_multiples = TRUE
 * )
 *
 * The "extract" plugin in core can extract array values when indexes are
 * already known. This plugin helps extract the last value in an array by
 * performing a "pop" operation.
 *
 * Example: Say, the migration source has an associative array of names in
 * a property called "authors" and the keys in the array can vary, you
 * can extract the last value like this:
 *
 * @code
 *   last_author:
 *     plugin: array_pop
 *     source: authors
 * @endcode
 */
class ArrayPop extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    if (!is_array($value)) {
      throw new MigrateException('Input should be an array.');
    }
    return array_pop($value);
  }

}
