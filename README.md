# IP Checker
Provides client IP functions.

### Services
The `ipChecker` component can be used to retrieve the client IP address.
The component injects the following variable into the page where it's used:
- **clientIp** - The remote client's IP address.

The component provides the following function.
- **isWithinRange** - Returns `true` if the client IP address is within the IP address range stored in the CMS backend settings.
