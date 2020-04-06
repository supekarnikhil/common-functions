<?php

	function convertJsonToArray( $strMessageBody, $boolIsAssociative = false ) {
		$arrmixMessageBody = json_decode( $strMessageBody, $boolIsAssociative );
		return $arrmixMessageBody;
	}

	function convertArrayToJson( $arrmixMessageBody ) {
		$strMessageBody = json_encode( $arrmixMessageBody );
		return $strMessageBody;
	}

	function convertToCamelCase( $strInput, $capitalizeFirstCharacter = true )  {
		$strCamelCase = str_replace( '_', '', ucwords( $strInput, '_' ) );
		if ( !$capitalizeFirstCharacter ) {
			$strCamelCase = lcfirst( $strCamelCase );
		}
		return $strCamelCase;
	}

	function rekeyArray( $strKey, $arrmixData, $boolHasDuplicateKeys = false, $strValColumn = '' ) {
		$arrmixReturnData = [];
		if( $boolHasDuplicateKeys ) {
			foreach( $arrmixData as $arrmixTempData ) {
				$arrmixReturnData[$arrmixTempData[$strKey]][] = ( $strValColumn != '' ) ? $arrmixTempData[$strValColumn] : $arrmixTempData;
			}
		} else {
			foreach( $arrmixData as $arrmixTempData ) {
				$arrmixReturnData[$arrmixTempData[$strKey]] = ( $strValColumn != '' ) ? $arrmixTempData[$strValColumn] : $arrmixTempData;
			}
		}
		return ( array ) $arrmixReturnData;
	}

	function valObj( $input, $strClassName ) {
		return ( isset( $input ) && is_a( $input, $strClassName ) );
	}

	function valArr( $input ) {
		return ( isset( $input ) && is_array( $input ) && count( $input ) > 0 );
	}

	function valStr( $input ) {
		return ( isset( $input ) && is_string( $input ) && strlen( trim( $input ) ) > 0 );
	}

	function valId( $input ) {
		return ( isset( $input ) && is_int( $input ) && $input > 0 );
	}

	function valFloat( $input ) {
		return ( isset( $input ) && ( is_int( $input ) || is_float( $input ) ) && $input > 0 );
	}

	function valEmail( $input ) {
		return ( valStr( $input ) && filter_var( $input, FILTER_VALIDATE_EMAIL ) );
	}

	function valImgUrl( $input ) {
		return preg_match( '/https?:\/\/[^ ]+?(?:\.jpg|\.png|\.gif)/', $input );
	}

	function valDocUrl( $input ) {
		return preg_match( '/https?:\/\/[^ ]+?(?:\.jpg|\.png|\.pdf)/', $input );
	}

	function valPan( $input ) {
		return preg_match( '/^[A-Z]{5}\d{4}[A-Z]{1}$/', $input );
	}

	function valGstin( $input ) {
		return preg_match( '/^\d{2}[A-Z]{5}\d{4}[A-Z]{1}[A-Z\d]{1}[Z]{1}[A-Z\d]{1}$/', $input );
	}

	function sanitizeInput( $input ) {
		return ( string ) htmlspecialchars( stripslashes( trim( $input ) ) );
	}

	function show( $input ) {
		echo '<pre>';
		print_r( $input );
		echo '</pre>';
	}

?>
