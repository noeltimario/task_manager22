-- Create the 'tasks' table
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,       -- Unique identifier for each task
    title VARCHAR(255) NOT NULL,             -- Title of the task
    description TEXT NOT NULL,               -- Description of the task
    status ENUM('pending', 'completed') NOT NULL DEFAULT 'pending', -- Task status
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp when the task was created
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Timestamp for last update
);

-- Insert sample data into the 'tasks' table
INSERT INTO tasks (title, description, status) VALUES
('Complete Project Report', 'Finish writing the final report for the project.', 'pending'),
('Team Meeting', 'Discuss project milestones and blockers.', 'completed'),
('Code Review', 'Review code submissions from the team.', 'pending');
