# Use Cases

## Use Case 1: Submit a Request
- Actor: Student
- Trigger: The student wants to report a problem or ask for campus support.
- Main Flow:
  1. The student opens the request submission page.
  2. The student enters the request title, description, category, and location.
  3. The student clicks the submit button.
  4. The system validates the input data.
  5. The system saves the request in the database with status “Pending”.
  6. The system shows a success message.
- Success Outcome: A new request is stored successfully.

## Use Case 2: View Request List
- Actor: Student
- Trigger: The student wants to see all submitted requests.
- Main Flow:
  1. The student opens the request list page.
  2. The system retrieves all requests submitted by that student.
  3. The system displays the request list.
- Success Outcome: The student can see all submitted requests.

## Use Case 3: View Request Details
- Actor: Student / Staff
- Trigger: The user wants to check one request.
- Main Flow:
  1. The user selects a request.
  2. The system retrieves the request information.
  3. The system displays full details.
- Success Outcome: The user can read the full details.

## Use Case 4: Update Request Status
- Actor: Staff
- Trigger: The staff member wants to process a request.
- Main Flow:
  1. The staff member opens the request details page.
  2. The staff member selects a new status.
  3. The system validates the status.
  4. The system updates the request status.
- Success Outcome: The request status is updated successfully.