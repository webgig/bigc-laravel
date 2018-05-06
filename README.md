# Customer Browser
The solution tries to implement the Domain Driven Design(DDD), Dependency Inversion and other SOLID principles where possible.
- Repository
```
     App\Repositories\ICustomerRepository
        App\Repositories\Impl\BigcommerceCustomerRepository
     App\Repositories\IOrderRepository
        App\Repositories\Impl\BigcommerceOrderRepository
```
- Entities
```
    App\Entities\AbstractApi
    App\Entities\Customer
    App\Entities\Order
 ```
- Services   
```
    App\Services\ICustomerService
        App\Services\Impl\BigcommerceCustomerService
```
- Controllers
```
    App\Controllers\CustomerDetailsController
    App\Controllers\CustomersController
```
- Unit Tests
```
    Tests\Unit\CustomerServiceTest
```
The above design is derived with scalability and extensibility in mind. There is still plenty of room for improvement for e.g the services can be more granular following the Single Responsiblity Principle but would obviosly depend on the business logic and the requirements, the controllers can be restful to serve requests from multiple sources like mobile or web.

# Note
Please add `CACHE_EXPIRY=expiry minute` config in `.env`


