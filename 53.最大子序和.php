<?php
/*
 * @lc app=leetcode.cn id=53 lang=php
 *
 * [53] 最大子序和
 *
 * https://leetcode-cn.com/problems/maximum-subarray/description/
 */

// @lc code=start
class Solution
{

    /**
     * @param int[] $nums
     * @return int
     */
    public function maxSubArray($nums)
    {
        $rowMax = [];

        $total = count($nums);

        for ($i = 0; $i < $total; $i ++) {
            $rowMax[$i] = $nums[$i];
            $tempSum = 0;
            for ($j = $i; $j < $total; $j ++) {
                $tempSum = $tempSum + $nums[$j];
                if ($tempSum > $rowMax[$i]) {
                    $rowMax[$i] = $tempSum;
                }
            }
        }

        $max = $rowMax[0];
        for ($i = 0; $i < $total; $i ++) {
            if ($max < $rowMax[$i]) {
                $max = $rowMax[$i];
            }
        }

        return $max;
    }
}
// @lc code=end
