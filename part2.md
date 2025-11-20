# Part 2 — Code Review & Debug

### A. Laravel Snippet

```php
 public function store(Request $request)
 {
 	 $task = Task::create($request->all());
 	 return response()->json($task);
 }
```

Questions:

1.  What issues do you see in this implementation?

```
The issue is there is no data validation. The request values are directly saved in the database
which could lead to SQL injection attacks.
```

2.  How would you improve it for security and maintainability?

```
To improve the security of the code. Code validation must be implemented to validate the request inputs.
In Laravel we can access the validate method in the request object and configure the validation rules or
we can create a custom FormRequest class to handle the validation. For maintainability, adding try catch
block and logging errors and moving it into a service class for cleaner controller action and a documentation
about what the function does the return type and parameters.
```

# B. React Snippet

```javascript
function AddTask() {
    const [title, setTitle] = useState("");

    const handleSubmit = (e) => {
        axios.post("/api/tasks", { title });
    };

    return (
        <form onSubmit={handleSubmit}>
            <input value={title} onChange={(e) => setTitle(e.target.value)} />
            <button>Add</button>
        </form>
    );
}
```

Questions:

1.  Identify at least two issues in this code.

```
The first issue is in handleSubmit. There is no e.preventDefault(). Without it the code will submit
the form and reload the whole page. The second issue is performance related by using useState.
The third is onChange handler inline function.
```

2.  Suggest improvements.

```
A. Add e.preventDefault() to handleSubmit to prevent page from reloading.
B. Instead of useState we can replace it with useRef instead so we don't have to trigger
   rerendering every time the state changes when onChange event fires.
C. Refactor onChange handler to a resusable function
```
