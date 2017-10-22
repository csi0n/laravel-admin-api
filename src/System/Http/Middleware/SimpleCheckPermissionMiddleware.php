<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/23/17
 * Time: 7:20 AM
 */

namespace csi0n\LaravelAdminApi\System\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use csi0n\LaravelAdminApi\System\Traits\SimplePermissionClassTrait;

class SimpleCheckPermissionMiddleware {
	use SimplePermissionClassTrait;

	/**
	 * @param Request $request
	 * @param Closure $next
	 *
	 * @return mixed
	 */
	public function handle( Request $request, Closure $next ) {
		$action = $request->route()->getAction();
		if ( isset( $action['controller'] ) ) {
			$results = [];
			preg_match( '/(.*)\@(.*)/', $action['controller'], $results );
			if ( sizeof( $results ) === 3 ) {
				$class = $results[1] and $method = $results[2];
				if ( $this->hasClassPermissionByClassMethod( $class, $method ) ) {
					return $next( $request );
				} else {
					abort( 403 );
				}
			}
		}
		abort( 404 );
	}
}