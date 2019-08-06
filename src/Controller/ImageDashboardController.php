<?php

namespace Hashbangcode\WebolutionDemo\Controller;

use Hashbangcode\Webolution\Evolution\Individual\Decorators\IndividualDecoratorFactory;
use Hashbangcode\Webolution\Evolution\Individual\ImageIndividual;
use Hashbangcode\Webolution\Evolution\Individual\Individual;
use Hashbangcode\WebolutionDemo\Controller\BaseController;
use Hashbangcode\WebolutionDemo\DashboardManager;
use Slim\Http\Request;
use Slim\Http\Response;
use Hashbangcode\Webolution\Evolution\Evolution;
use Hashbangcode\Webolution\Evolution\Population\ColorPopulation;
use Hashbangcode\Webolution\Evolution\Individual\ColorIndividual;
use Hashbangcode\Webolution\Evolution\EvolutionManager;
use Hashbangcode\Webolution\Evolution\Population\Decorators\PopulationDecoratorFactory;
use Hashbangcode\Webolution\Evolution\Statistics\Decorators\StatisticsDecoratorHtml;
use Hashbangcode\WebolutionDemo\Model\Evolution as EvolutionModel;

class ImageDashboardController extends BaseDashboardController
{

  const NUMBER_OF_INDIVIDUALS = 100;

  const DASHBOARD_TYPE = 'Image';

  const DASHBOARD_TITLE = 'Image Dashboard';

  const DASHBOARD_PATH = '/image_dashboard_evolution';

  const DASHBOARD_EVOLUTION_ID = 102;

  const DASHBOARD_ROUTE_NAME = 'image_dashboard_evolution';

  const DASHBOARD_RENDER_TYPE = 'html';

  public function generateIndividuals() {
    $individuals = [];
    for ($i = 0; $i < static::NUMBER_OF_INDIVIDUALS; $i++) {
      $image = ImageIndividual::generateFromImageSize(25, 25);
      $image->getObject()->setPixel(24, 12, 1);
      $individuals[] = $image;
    }
    return $individuals;
  }

}
