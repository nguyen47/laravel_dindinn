# Laravel Queue

# Question

Considering you have an application and you have the two types of user; the Client and
the Vendor and Client wants to Request something from the Vendor which is catered
by the app. There is a “waiting time of 5 seconds” before the Vendor receives the
Request (a confirmed Request).

# Answer

For this requirements, the perfect is using the Message Queue Architecture 

# Architecture

The architecture for the Message Qeue are:

* Producer: This is a service which is fire the **message** in action. In this question, when Clients sending the request, a event `NewOrderHasRegisteredEvent` will be fire.   
* Message: This is the Message when Clients send the request to the Vendor. This message will going to the Message Queue place and waiting to request. This is an asynchronus behaviour.
* Message Queue: This is the place to hold all the Message in the Service. There is some differents ways to hold the Messages using differents drivers such as Database, Redis, Beanstalkd or SQS. In this question, I will use Database drivers to hold the Message Queue. 
* Consumer: This is a service which is take the message from the Message Queue to handle. In Laravel, the cousmer is Listener Event.
* Worker: An background service, running to listen the event.
* Supervisor: This is an service running on environmenet to tracking the Service, it will make sure that the message is always handle by the cosumer. If something wrong during the process, the supervisor will take care of it and ask the cosumer run it again.

# Database

By default, Laravel 6 have a Queue built in. 

![](https://www.awesomescreenshot.com/upload//1081119/15c968ee-8955-4ac5-60b0-cbcba95bf38c.png)

In this database, we have three entities and two table for queue

## Three entities  
* Client Entity
* Order Entity
* Vendor Entity

All three entities using the business Logic. Client will send an order request to a specific vendor.

## Queue

In Laravel queue, it have 2 table.
* Jobs: This is Message Queue that  I mentioned above. It will hold all the message fired from producer (An event)
* Failed Jobs: After a consumer (Event Listener) cannot handle the request, it will save into this table.

# Workflow for this Question

* Client enter one Order Request and press Submit. It will redirect to clients page.
* Meanwhile, after client press Submit, a producer (an event) `NewOrderHasRegisteredEvent` will be called
* The event message will be save into the Jobs Table.
* A producer (an event listener) `SendOrderToVendorListener` will handle this event.
* After 10 seconds, the producer handle the event and save data into Order Table
* When the procuder finish the job, the message will be removed in database becasue Queue work in FIFO.

# Deployment

To deploy this scenario, we will need an VPS running the Linux envionment. The step to Deploy will be:

* Install Docker Envionmenet in VPS
* Install Laradock in VPS
* Running Laravel Application
* Create an worker daemon by running `php artisan queue:work &`
* Install supervisor in Linux: `sudo apt-get install supervisor`

In production envionmenet, we can use **Redis Driver** instead of **Database Driver**. The Database Driver is not really suitable for large request. 

# How to run application

* Install Composer Dependencies by command `composer install`
* Copy .env.example to .env by command `cp .env.example .env`
* Edit .env file
    * Edit database name, usernrame and password
    * Change QUEUE_CONNECTION from **sync** to **database**
* Generate Key by command `php artisan key:generate`
* Run migration by command `php artisan migrate`
* Run dbseed by command `php artisan db:seed`
* Run application by command `php artisan serve`
