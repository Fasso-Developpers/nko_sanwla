<?php
function calendrier($mois, $annee, $daysFormat){
	$nbre_jour = cal_days_in_month(CAL_GREGORIAN, $mois, $annee);
	

	// The days format in nko short format and long format
	$nko_days_short = '<tr><th>ߞߐ߬ߓ</th><th>ߞߐ߬ߟ</th>
						<th>ߞߎ߬ߣ</th><th>ߓߌߟ</th>
						<th>ߛߌ߬ߣ</th><th>ߞߍ߲ߘ</th>
						<th>ߞߊߙ</th></tr>';

	$nko_days_long =	'<tr><th>ߞߐ߬ߓߊ߬ߟߏ߲</th><th>ߞߐ߬ߟߏ߲</th>
						<th>ߞߎ߬ߣߎ߲߬ߟߏ߲</th><th>ߓߌߟߏ߲</th>
						<th>ߛߌ߬ߣߌ߲߬ߟߏ߲</th><th>ߞߍ߲ߘߍߟߏ߲</th>
						<th>ߞߊߙߌ</th></tr>';
	echo '<table>';

	if($daysFormat == "short")
	{
	// les jours de la semaine en nko
	echo $nko_days_short;	
	}
	elseif ($daysFormat == "long") 
	{
	echo $nko_days_long;	
	}
					//today
				define('today_bi', date('d') );
				define('mois_nin', date('m') );
				define('annee_nin', date('Y') );

			for ($i=1; $i <= $nbre_jour; $i++) 
			{ 
				$jour = cal_to_jd(CAL_GREGORIAN, $mois, $i, $annee);
				$jour_semaine = JDDayOfWeek($jour);

				if ($i == $nbre_jour) 
				{ 
					if ($jour_semaine == 1) 
					{
						echo '<tr>';
					}
					echo today_style($i, $mois, $annee).arabe_to_nko($i).'</td></tr>';
				}
				elseif ($i == 1) 
				{
					echo "<tr>";
					if ($jour_semaine == 0) 
					{
						$jour_semaine = 7;
					}

					for ($k=1; $k != $jour_semaine; $k++)  
					{ 
						echo '<td></td>';
					}
					echo today_style($i, $mois, $annee).arabe_to_nko($i).'</td>';
					if ($jour_semaine == 7) 
					{
						echo "</tr>";
					}
				}
				else
				{
					if ($jour_semaine == 1) 
					{
						echo "<tr>";
					}
					echo today_style($i, $mois, $annee).arabe_to_nko($i)."</td>";
					if ($jour_semaine == 0) 
					{
						echo "</tr>";
					}
				}
				/*
				// make today visible of other one
				if( $jour == $today_bi && $mois == date('m') && $annee == date('Y') )
				{
					echo "Today is ".$jour." ".$mois." ".$annee;
				}
				*/
			}
	echo '</table>';
}

function get_today(){
	//today
	$today_bi = date('d');
	$mois = date('m');
	$annee = date('Y');
	$jour = date('d');
	// make today visible of other one
	if( $jour == $today_bi && $mois == date('m') && $annee == date('Y') )
	{
		$bi = "Today is ".$jour." ".$mois." ".$annee;
		return $bi;
	}
}

function today_style($i, $mois, $annee){

	if( $i == today_bi && mois_nin == $mois && annee_nin == $annee )
	{
		return '<td class="active_date">';
	}else{
		return '<td class="case">';
	}

}

function affiche_nom_mois($d)
{
	$equivalent = $d-1;

	$moisTable  = array('ߓߌ߲ߠߊߥߎߟߋ߲','ߞߏ߲ߞߏߜߍ','ߕߙߊߓߊ','ߞߏ߲ߞߏߘߓߌ','ߘߓߊ߬ߕߊ','ߥߊ߬ߛߌ߬ߥߙߊ',
						'ߞߊ߬ߙߌ߬ߝߐ','ߘߓߊ߬ߓߌߟߊ','ߕߎߟߊߝߌ߲','ߞߏ߲ߓߌߕߌ߮','ߣߍߣߍߓߊ','ߞߏߟߌ߲ߞߏߟߌ߲');
	return $moisTable[$equivalent];
}	

function arabe_to_nko($i)
{	// This function convert the latin number to nko number
	if (is_numeric($i) ) 
	{
		if(abs($i) > 9)
		{

		}
		$nko_number = array('߀','߁','߂','߃','߄','߅','߆','߇','߈','߉','߁߀','߁߁','߁߂','߁߃','߁߄','߁߅',
							'߁߆','߁߇','߁߈','߁߉','߂߀','߂߁','߂߂','߂߃','߂߄','߂߅','߂߆','߂߇','߂߈','߂߉','߃߀','߃߁');
		$nko_day = $nko_number[$i];
		return $nko_day;
	}
	else
	{
		echo "This variable is not a number";
	}
}

function convert_year_to_nko($i){
	$nko_last_year = array(															 1900 => '߁߉߀߀',
						1901 => '߁߉߀߁',1902 => '߁߉߀߂',1903 => '߁߉߀߃',1904 => '߁߉߀߄',1905 => '߁߉߀߅',
						1906 => '߁߉߀߆',1907 => '߁߉߀߇',1908 => '߁߉߀߈',1909 => '߁߉߀߉',1910 => '߁߉߁߀',
						1911 => '߁߉߁߁',1912 => '߁߉߁߂',1913 => '߁߉߁߃',1914 => '߁߉߁߄',1915 => '߁߉߁߅',
						1916 => '߁߉߁߆',1917 => '߁߉߁߇',1918 => '߁߉߁߈',1919 => '߁߉߁߉',1920 => '߁߉߂߀',
						1921 => '߁߉߂߁',1922 => '߁߉߂߂',1923 => '߁߉߂߃',1924 => '߁߉߂߄',1925 => '߁߉߂߅',
						1926 => '߁߉߂߆',1927 => '߁߉߂߇',1928 => '߁߉߂߈',1929 => '߁߉߂߉',1930 => '߁߉߃߀',
						1931 => '߁߉߃߁',1932 => '߁߉߃߂',1933 => '߁߉߃߃',1934 => '߁߉߃߄',1935 => '߁߉߃߅',
						1936 => '߁߉߃߆',1937 => '߁߉߃߇',1938 => '߁߉߃߈',1939 => '߁߉߃߉',1940 => '߁߉߄߀',
						1941 => '߁߉߄߁',1942 => '߁߉߄߂',1943 => '߁߉߄߃',1944 => '߁߉߄߄',1945 => '߁߉߄߅',
						1946 => '߁߉߄߆',1947 => '߁߉߄߇',1948 => '߁߉߄߈',1949 => '߁߉߄߉',1950 => '߁߉߅߀',
						1951 => '߁߉߅߁',1952 => '߁߉߅߂',1953 => '߁߉߅߃',1954 => '߁߉߅߄',1955 => '߁߉߅߅',
						1956 => '߁߉߅߆',1957 => '߁߉߅߇',1958 => '߁߉߅߈',1959 => '߁߉߅߉',1960 => '߁߉߆߀',

						1961 => '߁߉߆߁',1962 => '߁߉߆߂',1963 => '߁߉߆߃',1964 => '߁߉߆߄',1965 => '߁߉߆߅',
						1966 => '߁߉߆߆',1967 => '߁߉߆߇',1968 => '߁߉߆߈',1969 => '߁߉߆߉',1970 => '߁߉߇߀',
						1971 => '߁߉߇߁',1972 => '߁߉߇߂',1973 => '߁߉߇߃',1974 => '߁߉߇߄',1975 => '߁߉߇߅',
						1976 => '߁߉߇߆',1977 => '߁߉߇߇',1978 => '߁߉߇߈',1979 => '߁߉߇߉',1980 => '߁߉߈߀',
						1981 => '߁߉߈߁',1982 => '߁߉߈߂',1983 => '߁߉߈߃',1984 => '߁߉߈߄',1985 => '߁߉߈߅',
						1986 => '߁߉߈߆',1987 => '߁߉߈߇',1988 => '߁߉߈߈',1989 => '߁߉߈߉',1990 => '߁߉߉߀',

						1991 => '߁߉߉߁',1992 => '߁߉߉߂',1993 => '߁߉߉߃',1994 => '߁߉߉߄',1995 => '߁߉߉߅',
						1996 => '߁߉߉߆',1997 => '߁߉߉߇',1998 => '߁߉߉߈',1999 => '߁߉߉߉',2000 => '߂߀߀߀',
						2001 => '߂߀߀߁',2002 => '߂߀߀߂',2003 => '߂߀߀߃',2004 => '߂߀߀߄',2005 => '߂߀߀߅',
						2006 => '߂߀߀߆',2007 => '߂߀߀߇',2008 => '߂߀߀߈',2009 => '߂߀߀߉',2010 => '߂߀߁߀',
						2011 => '߂߀߁߁',2012 => '߂߀߁߂',2013 => '߂߀߁߃',2014 => '߂߀߁߄',2015 => '߂߀߁߅',
						2016 => '߂߀߁߆',2017 => '߂߀߁߇',2018 => '߂߀߁߈',2019 => '߂߀߁߉',2020 => '߂߀߂߀',

						2021 => '߂߀߂߁',2022 => '߂߀߂߂',2023 => '߂߀߂߃',2024 => '߂߀߂߄',2025 => '߂߀߂߅',
						2026 => '߂߀߂߆',2027 => '߂߀߂߇',2028 => '߂߀߂߈',2029 => '߂߀߂߉',2030 => '߂߀߃߀',
						2031 => '߂߀߃߁',2032 => '߂߀߃߂',2033 => '߂߀߃߃',2034 => '߂߀߃߄',2035 => '߂߀߃߅',
						2036 => '߂߀߃߆',2037 => '߂߀߃߇',2038 => '߂߀߃߈',2039 => '߂߀߃߉',2040 => '߂߀߄߀',

						2041 => '߂߀߄߁',2042 => '߂߀߄߂',2043 => '߂߀߄߃',2044 => '߂߀߄߄',2045 => '߂߀߄߅',
						2046 => '߂߀߄߆',2047 => '߂߀߄߇',2048 => '߂߀߄߈',2049 => '߂߀߄߉',2050 => '߂߀߅߀',
						2051 => '߂߀߅߁',2052 => '߂߀߅߂',2053 => '߂߀߅߃',2054 => '߂߀߅߄',2055 => '߂߀߅߅',
						2056 => '߂߀߅߆',2057 => '߂߀߅߇',2058 => '߂߀߅߈',2059 => '߂߀߅߉',2060 => '߂߀߆߀',

						2061 => '߂߀߆߁',2062 => '߂߀߆߂',2063 => '߂߀߆߃',2064 => '߂߀߆߄',2065 => '߂߀߆߅',
						2066 => '߂߀߆߆',2067 => '߂߀߆߇',2068 => '߂߀߆߈',2069 => '߂߀߆߉',2070 => '߂߀߇߀',
						2071 => '߂߀߇߁',2072 => '߂߀߇߂',2073 => '߂߀߇߃',2074 => '߂߀߇߄',2075 => '߂߀߇߅',
						2076 => '߂߀߇߆',2077 => '߂߀߇߇',2078 => '߂߀߇߈',2079 => '߂߀߇߉',2080 => '߂߀߈߀',

						2081 => '߂߀߈߁',2082 => '߂߀߈߂',2083 => '߂߀߈߃',2084 => '߂߀߈߄',2085 => '߂߀߈߅',
						2086 => '߂߀߈߆',2087 => '߂߀߈߇',2088 => '߂߀߈߈',2089 => '߂߀߈߉',2090 => '߂߀߉߀',
						2091 => '߂߀߉߁',2092 => '߂߀߉߂',2093 => '߂߀߉߃',2094 => '߂߀߉߄',2095 => '߂߀߉߅',
						2096 => '߂߀߉߆',2097 => '߂߀߉߇',2098 => '߂߀߉߈',2099 => '߂߀߉߉',2100 => '߂߁߀߀',
						);
	$nko_year = $nko_last_year[$i];
	return $nko_year;
}

?>