# IP Checker plugin for October CMS
Provides client IP functions.

## Instructions
1. In the backend settings page, specify the IP address to check for.
2. Optionally, specify an end IP address if you want to check whether the clients IP address is within a range.
3. Add the IP Checker component `{% component 'ipChecker' %}` to your CMS page.

### Component usage
The component can be used to retrieve the client IP address.
The component injects the following variable into the page where it's used:
- `clientIp` - The remote client's IP address.

The component provides the following functions.
- `isIpAddress` - Returns `true` if the client IP address matches the IP address stored in the CMS backend settings.
- `isWithinRange` - Returns `true` if the client IP address is within the IP address range stored in the CMS backend settings.
