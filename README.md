# Object Pool
Object Pool Pattern

This pattern in suitable for systems which object construction and destruction have much cost

object pool contains all available and inuse objects in itself and in each request for new object, checks the available objects, 

if got any,will return to you, if not, will create a new object then returns to you

you also can add a max nuber of available objects in you code to manage objects count
