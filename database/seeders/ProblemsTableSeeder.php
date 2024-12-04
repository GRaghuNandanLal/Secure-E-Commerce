<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProblemsTableSeeder extends Seeder
{
    public function run()
    {
        $problems = [
            [
                'title' => 'K-Means Clustering',
                'description' => 'Implement the K-Means clustering algorithm to group a given set of points in a two-dimensional space into clusters and return the centroids of these clusters. You are provided with the following points: [[1, 2], [1, 4], [1, 0], [10, 2], [10, 4], [10, 0]] and the number of clusters \( k = 2 \). Your task is to initialize the algorithm with random centroids, assign each point to the nearest centroid, update the centroids based on the mean of the assigned points, and repeat these steps until the centroids do not change significantly (convergence). Ensure that your implementation does not use any external libraries or modules. The expected output should be the final cluster centroids, which should be [[1.0, 2.0], [10.0, 2.0]]. Additionally, during your implementation, print the initial centroids, the clusters formed during each iteration, and the final centroids upon convergence.',
                'solution' => '[[1.0, 2.0], [10.0, 2.0]]',
            ],
            [
                'title' => 'Linear Regression',
                'description' => 'Write a function that performs linear regression using the least squares method. If you are provided with a list of (x, y) points, such as [(1, 1), (2, 2), (3, 3)], your task is to calculate and return the slope and intercept of the best-fit line. The formula for slope (m) is given by m = (N * Σ(xy) - Σx * Σy) / (N * Σ(x^2) - (Σx)^2), where N is the number of points. The expected output for the input points should be the slope and intercept as a tuple (1.0, 0.0). Ensure your function handles cases where the line is vertical, leading to an undefined slope.',
                'solution' => '(1.0, 0.0)',
            ],
            [
                'title' => 'Decision Tree Implementation',
                'description' => 'Implement a basic decision tree classifier from scratch. If the provided dataset is a list of tuples, where each tuple contains feature values and a corresponding label (e.g., [([1, 2], 0), ([2, 3], 1)]), your goal is to construct a decision tree based on this data. After building the tree, implement a prediction function that classifies new samples. For example, if you call your prediction function with the input [1.5, 2.5], it should return the predicted label based on the decision tree constructed from the dataset. Make sure your implementation supports both categorical and numerical features.',
                'solution' => '0',
            ],
            
        ];

        DB::table('problems')->insert($problems);
    }
}
