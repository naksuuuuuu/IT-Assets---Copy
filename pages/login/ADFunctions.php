<?php
function checkAD($ad_user,$ad_passw){
	$user = $ad_user;
	$password = $ad_passw;
	//$host = '10.66.8.10';
	$domain = 'cpfp.co.ph';
	$basedn = 'dc=cpfp,dc=co,dc=ph';
	$group = 'Logistics_Billing';
	// Create the DN
	//$dn = "OU=Infrastructure,OU=CPFP Admins,DC=cpfp,DC=co,DC=ph";
	$ad = ldap_connect("ldap://{$domain}") or die('Could not connect to LDAP server.');
	ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);
	$bind = @ldap_bind($ad, "{$user}@{$domain}", $password);
	if($bind) {
		$userdn = getDN($ad, $user, $basedn);
		//echo $userdn."<br/>";
		if (checkGroupEx($ad, $userdn, getDN($ad, $group, $basedn))) {
		//if (checkGroup($ad, $userdn, getDN($ad, $group, $basedn))) {
			//echo "You're authorized as ".getCN($userdn);
			return true;
		} else {
			//echo 'Authorization failed';
			echo '<script>';
				echo 'alert("Authorization failed.\nPlease Contact IT, to add memberof Logistics Billing with your AD.")';
			echo '</script>';
			return false;
		}
		
	}
	else {
		//echo "Invalid AD user/password.";
		echo '<script>';
			echo 'alert("Invalid AD Username/Password.")';
		echo '</script>';
		return false;
	}
	ldap_unbind($ad);
}
/*
* This function searchs in LDAP tree ($ad -LDAP link identifier)
* entry specified by samaccountname and returns its DN or epmty
* string on failure.
*/
function getDN($ad, $samaccountname, $basedn) {
    $attributes = array('dn');
    $result = ldap_search($ad, $basedn,
        "(samaccountname={$samaccountname})", $attributes);
    if ($result === FALSE) { return ''; }
    $entries = ldap_get_entries($ad, $result);
    if ($entries['count']>0) { return $entries[0]['dn']; }
    else { return ''; };
}

/*
* This function retrieves and returns CN from given DN
*/
function getCN($dn) {
    preg_match('/[^,]*/', $dn, $matchs, PREG_OFFSET_CAPTURE, 3);
    return $matchs[0][0];
}

/*
* This function checks group membership of the user, searching only
* in specified group (not recursively).
*/
function checkGroup($ad, $userdn, $groupdn) {
    $attributes = array('members');
    $result = ldap_read($ad, $userdn, "(memberof={$groupdn})", $attributes);
    if ($result === FALSE) { return FALSE; };
    $entries = ldap_get_entries($ad, $result);
    return ($entries['count'] > 0);
}

/*
* This function checks group membership of the user, searching
* in specified group and groups which is its members (recursively).
*/
function checkGroupEx($ad, $userdn, $groupdn) {
    $attributes = array('memberof');
    $result = ldap_read($ad, $userdn, '(objectclass=*)', $attributes);
    if ($result === FALSE) { return FALSE; };
    $entries = ldap_get_entries($ad, $result);
    if ($entries['count'] <= 0) { return FALSE; };
    if (empty($entries[0]['memberof'])) { return FALSE; } else {
        for ($i = 0; $i < $entries[0]['memberof']['count']; $i++) {
            if ($entries[0]['memberof'][$i] == $groupdn) { return TRUE; }
            elseif (checkGroupEx($ad, $entries[0]['memberof'][$i], $groupdn)) { return TRUE; };
        };
    };
    return FALSE;
}
?>