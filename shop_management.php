<?php
require_once 'data.php';

function createShop($name, $owner)
{
	
}
function addShopUser($shop, $user)
{
}

// View
function shopConfigView($shop = "")
{
	echo "<!DOCTYPE html><html><head>";
	include 'include.php';
	echo '</head><body><div class="container">';
	if ($shop == "")
	{
		// Shop Configuration - Main Screen
		
		// Check to see if data is set correctly...
		if (userRoleIncludes(USER_PERMISSION_VIEW_SHOP))
		{
			include 'menu.php';
			
		} else
		{
			// Error
		}
	} else
	{
		// Individual Shop Configuration
		if (userRoleIncludes(USER_PERMISSION_VIEW_SHOP) || userShopRoleIncludes(S_USER_PERMISSION_VIEW_SHOP))
		{
			
		}
	}
	echo '</div></body></html>';
}
?>