<?php

namespace Thunderlabid\PACKAGE_NAME\BLL\Aggregates;

/*===============================
=            Laravel            =
===============================*/
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
/*=====  End of Laravel  ======*/

/*=============================
=            MODEL            =
=============================*/
use Thunderlabid\PACKAGE_NAME\DAL\Models\MODEL_NAME as MainModel;
/*=====  End of MODEL  ======*/

/*=================================
=            Interface            =
=================================*/
use Thunderlabid\PACKAGE_NAME\BLL\Aggregates\Interfaces\AggregateInterface;
/*=====  End of Interface  ======*/

/*=============================
=            Trait            =
=============================*/
use Thunderlabid\PACKAGE_NAME\BLL\Aggregates\Traits\HasUUID;
use Thunderlabid\PACKAGE_NAME\BLL\Aggregates\Traits\DomainAggregate;
/*=====  End of Trait  ======*/

/*=============================
=            EVENT            =
=============================*/
use Thunderlabid\PACKAGE_NAME\BLL\Events\MODEL_NAME\Deleting;
use Thunderlabid\PACKAGE_NAME\BLL\Events\MODEL_NAME\Deleted;

use Thunderlabid\PACKAGE_NAME\BLL\Events\MODEL_NAME\Restoring;
use Thunderlabid\PACKAGE_NAME\BLL\Events\MODEL_NAME\Restored;

use Thunderlabid\PACKAGE_NAME\BLL\Events\MODEL_NAME\Editing;
use Thunderlabid\PACKAGE_NAME\BLL\Events\MODEL_NAME\Edited;

use Thunderlabid\PACKAGE_NAME\BLL\Events\MODEL_NAME\Creating;
use Thunderlabid\PACKAGE_NAME\BLL\Events\MODEL_NAME\Created;
/*=====  End of EVENT  ======*/

class MODEL_NAMEAggregate implements AggregateInterface
{
	/*=============================
	=            Trait            =
	=============================*/
	use HasUUID, 
		DomainAggregate;
	/*=====  End of Trait  ======*/
	
	/*=================================
	=            Variables            =
	=================================*/
	const MODEL 									= MainModel::class;

	const EVENT_DELETING 							= Deleting::class;
	const EVENT_DELETED 							= Deleted::class;

	const EVENT_RESTORING 							= Restoring::class;
	const EVENT_RESTORED 							= Restored::class;

	const EVENT_EDITING 							= Editing::class;
	const EVENT_EDITED 								= Edited::class;

	const EVENT_CREATING 							= Creating::class;
	const EVENT_CREATED 							= Created::class;
	/*=====  End of Variables  ======*/
}