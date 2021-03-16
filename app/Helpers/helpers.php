<?php

use App\Part;

function userState($state) {
	if ($state==0) {
		return '<span class="badge badge-danger">Inactivo</span>';
	} elseif ($state==1) {
		return '<span class="badge badge-success">Activo</span>';
	} else {
		return '<span class="badge badge-dark">Desconocido</span>';
	}
}

function stock($stock) {
	if ($stock>=10) {
		return '<button type="button" class="btn btn-success">'.$stock.'</button>';
	} elseif ($stock==9 || $stock==8 || $stock==7 || $stock==6) {
		return '<button type="button" class="btn btn-warning">'.$stock.'</button>';
	} else {
		return '<button type="button" class="btn btn-danger">'.$stock.'</button>';
	}
}

function workState($state) {
	if ($state==3) {
		return '<span class="badge badge-danger">Cancelado</span>';
	} elseif ($state==2) {
		return '<span class="badge badge-warning">En Progreso</span>';
	} elseif ($state==1) {
		return '<span class="badge badge-success">Completado</span>';
	} else {
		return '<span class="badge badge-dark">Desconocido</span>';
	}
}

function userType($type) {
	if ($type==1) {
		return '<span class="badge badge-success">Administrador</span>';
	} elseif ($type==2) {
		return '<span class="badge badge-primary">Especial</span>';
	} elseif ($type==3) {
		return '<span class="badge badge-info">Vendedor</span>';
	} elseif ($type==4) {
		return '<span class="badge badge-warning">Proveedor Particular</span>';
	} elseif($type==5) {
		return '<span class="badge badge-danger">Proveedor Empresarial</span>';
	} else{
		return '<span class="badge badge-dark">Cliente</span>';
	}
}

function providerType($type) {
	if ($type==4) {
		return '<span class="badge badge-success">Particular</span>';
	} elseif ($type==5) {
		return '<span class="badge badge-primary">Empresarial</span>';
	} else {
		return '<span class="badge badge-danger">Desconocido</span>';
	}
}

function selectArray($arrays, $selectedItems) {
	$selects="";
	foreach ($arrays as $array) {
		if (count($selectedItems)>0) {
			foreach ($selectedItems as $selected) {
				if ($selected->slug==$array->slug) {
					$select="selected";
					break;
				} else {
					$select="";
				}
			}
		}
		$selects.='<option value="'.$array->slug.'" '.$select.'>'.$array->name.'</option>';
	}
	return $selects;
}

function selectPart($side, $selected) {
	$selects="";
	$parts=Part::where('side', $side)->orderBy('name', 'ASC')->get();
	foreach ($parts as $part) {
		if ($selected==$part->id) {
			$select="selected";
		} else {
			$select="";
		}
		$selects.='<option value="'.$part->slug.'" '.$select.'>'.$part->name.'</option>';
	}
	return $selects;
}

function selectDays($selectedItems, $object=false) {
	$selects="";
	$arrays=['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
	foreach ($arrays as $array) {
		if (count($selectedItems)>0) {
			foreach ($selectedItems as $selected) {
				if ($object) {
					if ($selected->day==$array) {
						$select="selected";
						break;
					} else {
						$select="";
					}
				} else {
					if ($selected==$array) {
						$select="selected";
						break;
					} else {
						$select="";
					}
				}
			}
		}
		$selects.='<option '.$select.'>'.$array.'</option>';
	}
	return $selects;
}

function admin()
{
	return auth()->user()->type == 1 ? true : false;
}

function vendedor()
{
	return auth()->user()->type == 3 ? true : false;
}

// function saleState($state) {
// 	if ($state==1) {
// 		return '<span class="badge badge-success">Aprobado</span>';
// 	} elseif ($state==2) {
// 		return '<span class="badge badge-warning">Pendiente</span>';
// 	} elseif ($state==3) {
// 		return '<span class="badge badge-danger">Rechazado</span>';
// 	} else {
// 		return '<span class="badge badge-primary">Desconocido</span>';
// 	}
// }

